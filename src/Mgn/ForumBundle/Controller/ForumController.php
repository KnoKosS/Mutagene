<?php

namespace Mgn\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mgn\ForumBundle\Entity\Topic;
use Mgn\ForumBundle\Entity\Mark;

use Mgn\ForumBundle\Form\TopicType;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ForumController extends Controller
{
	private function active()
    {
        $config = $this->container->get('mgn.config');
        
        if( $config->get('cmsForum') === false )
        {
            throw $this->createNotFoundException('Forum désactiver');
        }
    }

    public function allAction($mark)
    {
        $this->active();

    	//ici on recuperera la liste des categories et sections
        $forums = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnForumBundle:Forum')
                         ->getAllWithCategories();

        $config = $this->container->get('mgn.config');

        $user = $this->container->get('security.context')->getToken()->getUser();

        //on vérifie si l'on veut marquer les catégories comme lu
        if( $mark == 'markall' )
        {
            if( ! is_object($user) )
            {
                throw new AccessDeniedException('Vous n\'êtes pas authentifié.');
            }
                
            $em = $this->getDoctrine()->getManager();

            foreach($forums as $forum)
            {
            
                $mark_cat = $em->getRepository('MgnForumBundle:Mark')
                             ->findMark($user, $forum);
                             
                if( $mark_cat === null )
                {
                    $mark_cat = $em->getRepository('MgnForumBundle:Mark');
                    
                    $mark_cat = new Mark;
                }
                
                $mark_cat->setUser($user);
                $mark_cat->setForum($forum);
                $mark_cat->setDate(new \Datetime());
                
                $em->persist($mark_cat);
            }
            
            $em->flush();
        }

        $marks = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnForumBundle:Mark')
                         ->findAllMark($user);
                         
        $views = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnForumBundle:View')
                         ->findAllView($user);
        
        $thereOneWeek = new \Datetime();
        $thereOneWeek->modify('-7 days');
        
        $latestMessages = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnMessageBundle:Message')
                         ->findMessagesAfterDate($thereOneWeek);
		
		//on appel le template et on lui envoie la liste
        return $this->render('MgnForumBundle:Forums:all'.$config->get('forumAppearance').'.html.twig', array(
            'forums' => $forums,
            'marks' => $marks,
            'views' => $views,
            'latestMessages' => $latestMessages,
        ));
    }

    public function viewAction($id, $page, $mark)
    {
        $this->active();

        $config = $this->container->get('mgn.config');

        // On ne sait pas combien de pages il y a, mais on sait qu'une page
        // doit être supérieure ou égale à 1.
        if( $page < 1 )
        {
            $page = 1;
        }
        
        //on récupère les informations sur le forum
        $forum = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('MgnForumBundle:Forum')
                        ->getForum($id);
        
        // Si le forum n'existe pas, on affiche une erreur 404
        if( $forum === null )
        {
            return $this->render('MgnForumBundle:NotFound:forum.html.twig');
        }

        // acl
        $forumAclView = 0;
        $forumAclTopic = 0;

        $forumAclView = $forumAclView + $forum->getPublicAclView();
        $forumAclTopic = $forumAclTopic + $forum->getPublicAclTopic();

        if( $this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
        {
            $forumAclView = $forumAclView + 1;
            $forumAclTopic = $forumAclTopic + 1;
        }

        if( $this->get('security.context')->isGranted('ROLE_FORUM_READ_'.$forum->getId()))
        {
            $forumAclView = $forumAclView + 1;
        }

        if( $this->get('security.context')->isGranted('ROLE_FORUM_TOPIC_'.$forum->getId()))
        {
            $forumAclTopic = $forumAclTopic + 1;
        }
        
        if( $forumAclView == 0 )
        {
            return $this->render('MgnForumBundle:NotAcl:forum.html.twig');
        }

        $user = $this->container->get('security.context')->getToken()->getUser();

        //on vérifie si l'on veut marquer la forum comme lu
        if( $mark == 'mark' )
        {
           if( ! is_object($user) )
            {
                throw new AccessDeniedException('Vous n\'êtes pas authentifié.');
            }

            $this->markAction($user, $forum);
        }
                         
        $thereOneWeek = new \Datetime();
        $thereOneWeek->modify('-7 days');

        $mark = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnForumBundle:Mark')
                         ->findMark($user, $forum);
                         
        $views = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnForumBundle:View')
                         ->findViewsForForum($user, $forum);

        // Création du form pour l'ajout d'un topic
        $topic = new Topic;
                        
        $topic->setForum($forum);
        
        // On crée le FormBuilder grâce à la méthode du contrôleur.
        $form = $this->createForm(new TopicType, $topic);
                         
        //on appel le template
        return $this->render('MgnForumBundle:Forums:view'.$config->get('forumAppearance').'.html.twig', array(
            'forum' => $forum,
            'mark' => $mark,
            'views' => $views,
            'thereOneWeek' => $thereOneWeek,
            'forumAclTopic' => $forumAclTopic,
            'form' => $form->createView(),
        ));
    }

    private function markAction($user, $forum)
    {
        $em = $this->getDoctrine()->getManager();
            
        $mark_cat = $em->getRepository('MgnForumBundle:Mark')
                     ->findMark($user, $forum);

        if( $mark_cat === null )
        {
            $mark_cat_new = $em->getRepository('MgnForumBundle:Mark');
            
            $mark_cat_new = new Mark;

            $mark_cat_new->setuser($user);
            $mark_cat_new->setForum($forum);
            $mark_cat_new->setDate(new \Datetime());

            $em->persist($mark_cat_new);
        }
        else
        {
            $mark_cat->setuser($user);
            $mark_cat->setForum($forum);
            $mark_cat->setDate(new \Datetime());
        }
        
        $em->flush();
    }
}
