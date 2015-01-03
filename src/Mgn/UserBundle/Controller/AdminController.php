<?php

namespace Mgn\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mgn\UserBundle\Entity\Group;

use Mgn\UserBundle\Entity\UserToGroup;
use Mgn\UserBundle\Form\GroupType;
use Mgn\UserBundle\Form\GroupAdministerType;
use Mgn\UserBundle\Form\GroupAddUserType;
use Mgn\UserBundle\Form\GroupEditUserType;
use Mgn\UserBundle\Form\AdminProfileType;
use Mgn\UserBundle\Form\AdminProfileSocialType;
use Mgn\UserBundle\Form\AdminProfileSecurityType;
use Mgn\UserBundle\Form\AdminProfilePasswordType;
use Mgn\UserBundle\Form\AdminProfileAvatarType;
use Mgn\UserBundle\Form\AdminProfileDeletedType;

use JMS\SecurityExtraBundle\Annotation\Secure;

class AdminController extends Controller
{
    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function listUsersAction()
    {
        $users_list = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnUserBundle:User')
                         ->findBy(array('deleted' => false));

        return $this->render('MgnUserBundle:Admin:user_list.html.twig', array(
			'users_list' => $users_list,
        ));
    }

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function profileUserAction($id)
    {
        $user = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnUserBundle:User')
                         ->find($id);

        if( $user == null )
        {
            $this->get('session')->getFlashBag()->add('success', 'Aucun utilisateur trouvé.');

            return $this->redirect( $this->generateUrl('mgn_user_admin_list_user'));
        }

        if( $user->getDeleted() == true )
        {
            $this->get('session')->getFlashBag()->add('success', 'L\'utilisateur demandé à été supprimé.');

            return $this->redirect( $this->generateUrl('mgn_user_admin_list_user'));
        }

        $groups = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnUserBundle:UserToGroup')
                         ->loadGroupForUser($id);

        $config = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnCoreBundle:Config')
                         ->findOneBy(array('cms' => 'mutagene'));

        $user2 = clone $user;

        $formProfile = $this->createForm(new AdminProfileType($this->container), $user);
        $formSocial = $this->createForm(new AdminProfileSocialType($this->container), $user);
        $formSecurity = $this->createForm(new AdminProfileSecurityType($this->container), $user);
        $formPassword = $this->createForm(new AdminProfilePasswordType($this->container), $user);
        $formAvatar = $this->createForm(new AdminProfileAvatarType($this->container), $user);
        $formDeleted = $this->createForm(new AdminProfileDeletedType($this->container), $user);

        $request = $this->get('request');

        // On vérifie qu'elle est de type « POST ».
        if( $request->getMethod() == 'POST' )
        {
            // On fait le lien Requête <-> Formulaire.
            $formProfile->handleRequest($request);
            $formSocial->handleRequest($request);
            $formSecurity->handleRequest($request);
            $formPassword->handleRequest($request);
            $formAvatar->handleRequest($request);
            $formDeleted->handleRequest($request);
    
            // On vérifie que les valeurs rentrées sont correctes.
            if( $formProfile->isValid() or $formSocial->isValid() or $formSecurity->isValid() or $formAvatar->isValid() )
            {
                // On l'enregistre notre objet $article dans la base de données.
                $em = $this->getDoctrine()->getManager();

                if( $user->getLocked() == true )
                {
                    $user->removeRole('ROLE_USER');
                }
                elseif ( $user->getLocked() == false )
                {
                    $user->addRole('ROLE_USER');
                    $user->setLockedFor(null);
                }

                $em->flush();
                
                //message de confirmation
                $this->get('session')->getFlashBag()->add('success', 'Le profil à bien été mis à jour.');
                
                // On redirige vers la page d'accueil, par exemple.
                return $this->redirect( $this->generateUrl('mgn_user_admin_profile_user', array( 'id' => $user->getId() )));

            }

            if( $formDeleted->isValid() )
            {
                // On l'enregistre notre objet $article dans la base de données.
                $em = $this->getDoctrine()->getManager();

                $userToGroups = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('MgnUserBundle:UserToGroup')
                         ->loadGroupForUser($user);

                if( $userToGroups !== null )
                {
                    foreach($userToGroups as $userToGroup)
                    {
                        $userToGroup->getGroup()->setCountUsers($userToGroup->getGroup()->getCountUsers() - 1);
                        $em->remove($userToGroup);
                    }
                }

                $em->flush();

                $user->setActive(false);
                $user->removeRole('ROLE_USER');
                $user->setAvatar('default');
                $user->setLocked(true);
                $user->setLockedFor('Compte supprimé');

                $config->setTotalUsers($config->getTotalUsers()-1);
                
                //message de confirmation
                $this->get('session')->getFlashBag()->add('success', 'Le compte de '.$user2->getUsername().' à bien été supprimé !');

                $em->flush();
                
                // On redirige vers la page d'accueil, par exemple.
                return $this->redirect( $this->generateUrl('mgn_user_admin_list_user'));

            }

            if( $formPassword->isValid() )
            {
                $em = $this->getDoctrine()->getManager();

                $factory = $this->get('security.encoder_factory');

                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);

                $em->persist($user);
                $em->flush();

                
                $this->get('session')->getFlashBag()->add('success', 'Le mot de passe à bien été mis à jour.');

                return $this->redirect( $this->generateUrl('mgn_user_admin_profile_user', array( 'id' => $user->getId() )));
            }

        }

        return $this->render('MgnUserBundle:Admin:profile.html.twig', array(
            'user' => $user,
            'groups' => $groups,
            'formProfile' => $formProfile->createView(),
            'formSocial' => $formSocial->createView(),
            'formSecurity' => $formSecurity->createView(),
            'formPassword' => $formPassword->createView(),
            'formAvatar' => $formAvatar->createView(),
            'formDeleted' => $formDeleted->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function listGroupsAction()
    {
        $group = new Group;

        $form = $this->createForm(new GroupType, $group);

        $request = $this->get('request');

        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();

                $em->persist($group);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('success', 'Votre nouveau groupe à bien été ajouté.');

                return $this->redirect( $this->generateUrl('mgn_user_admin_list_group'));
            }
        }

        $groups_list = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnUserBundle:Group')
                         ->findBy(
                            array(),                 // Pas de critère
                            array('name' => 'ASC'), // On tri par date décroissante
                            NULL,       // On sélectionne $nb_articles_page articles
                            NULL                  // A partir du $offset ième
                        );

        return $this->render('MgnUserBundle:Admin:group_list.html.twig', array(
            'groups_list' => $groups_list,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function administerGroupAction($id, $user)
    {
        $group = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MgnUserBundle:Group')
                         ->loadGroupWithUsers($id);

        $formgroup = $this->createForm(new GroupAdministerType, $group);

        $userToGroup = new UserToGroup;

        $formuser = $this->createForm(new GroupAddUserType, $userToGroup);

        if( $user != null )
        {
            $userToGroup = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('MgnUserBundle:UserToGroup')
                         ->findOneBy(
                            array('group' => $group, 'user' => $user),                 // Pas de critère
                            array(), // On tri par date décroissante
                            NULL,       // On sélectionne $nb_articles_page articles
                            NULL                  // A partir du $offset ième
                        );

            $formuser = $this->createForm(new GroupEditUserType, $userToGroup);
        }

        $request = $this->get('request');

        if('POST' === $request->getMethod())
        {
            $em = $this->getDoctrine()->getManager();

            if ($request->request->has('mgn_userbundle_groupaddusertype'))
            {
                $formuser->bind($request);

                if ($formuser->isValid())
                {
                    $userToGroup->setGroup($group);

                    if( $user == null )
                    {
                        $group->setCountUsers($group->getCountUsers() + 1);
                    }

                    $em->persist($userToGroup);
                    $em->flush();

                    //message de confirmation
                    if( $user == null )
                    {
                        $this->get('session')->getFlashBag()->add('success', 'Le membre à bien été ajouté.');
                    }
                    else
                    {
                        $this->get('session')->getFlashBag()->add('success', 'Le membre à bien été modifié.');
                    }

                    return $this->redirect( $this->generateUrl('mgn_user_admin_group_administer', array( 'id' => $group->getId() )));
                }
            }

            if ($request->request->has('mgn_userbundle_groupadministertype'))
            {
                $formgroup->bind($request);

                if ($formgroup->isValid())
                {
                    $em->persist($group);
                    $em->flush();

                    $this->get('session')->getFlashBag()->add('success', 'Le groupe à bien été mis à jour.');

                    return $this->redirect( $this->generateUrl('mgn_user_admin_group_administer', array( 'id' => $group->getId() )));
                }
            }
        }

        return $this->render('MgnUserBundle:Admin:groupAdminister.html.twig', array(
            'group' => $group,
            'user' => $user,
            'userToGroup' => $userToGroup,
            'formgroup' => $formgroup->createView(),
            'formuser' => $formuser->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function deleteUserToGroupAction($groupid, $userid)
    {
        $group = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('MgnUserBundle:Group')
                         ->find($groupid);

        if( $group === null )
        {
            throw $this->createNotFoundException('Group [id='.$groupid.'] inexistant');
        }

        $userToGroup = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('MgnUserBundle:UserToGroup')
                         ->findOneBy(
                            array('group' => $groupid, 'user' => $userid),                 // Pas de critère
                            array(), // On tri par date décroissante
                            NULL,       // On sélectionne $nb_articles_page articles
                            NULL                  // A partir du $offset ième
                        );

        if( $userToGroup === null )
        {
            throw $this->createNotFoundException('UserToGroup inexistant');
        }

        $group->setCountUsers($group->getCountUsers() - 1);

        $em = $this->getDoctrine()->getManager();

        $em->remove($userToGroup);

        $em->flush();

        //message de confirmation
        $this->get('session')->getFlashBag()->add('successUser', '' . $userToGroup->getUser()->getUsername() . ' à bien été expulsé du groupe.');
            
        return $this->redirect( $this->generateUrl('mgn_user_admin_group_administer', array('id' => $groupid)));
    }

    /**
     * @Secure(roles="ROLE_SUPER_ADMIN")
     */
    public function deleteGroupAction($id)
    {
        $group = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('MgnUserBundle:Group')
                         ->find($id);

        if( $group === null )
        {
            throw $this->createNotFoundException('Group [id='.$id.'] inexistant');
        }

        //message de confirmation
        $this->get('session')->getFlashBag()->add('success', 'Le groupe ' . $group->getName() . ' à bien été supprimé.');

        $em = $this->getDoctrine()->getManager();

        $em->remove($group);

        $em->flush();
            
        return $this->redirect( $this->generateUrl('mgn_user_admin_list_group'));
    }
}
