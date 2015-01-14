<?php

namespace Mgn\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Mgn\MessageBundle\Entity\Message;
use Mgn\MessageBundle\Form\MessageType;

class ArticleController extends Controller
{
	public function indexAction($page)
	{
	    if ($page < 1) {
	      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
	    }

		$config = $this->container->get('mgn.config');
		
		// On récupère notre objet Paginator
		$articles = $this->getDoctrine()
                      	 ->getManager()
                      	 ->getRepository('MgnArticleBundle:Article')
                      	 ->getArticlesIndex($page, $config->get('articleCountIndex'));

	    // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces
	    $countPages = ceil(count($articles)/$config->get('articleCountIndex'));

	    // Si la page n'existe pas, on retourne une 404
	    if ($page-1 > $countPages) {
	      throw $this->createNotFoundException("La page ".$page." n'existe pas.");
	    }
		
		// On donne toutes les informations nécessaires à la vue
		return $this->render('MgnArticleBundle:Article:index.html.twig', array(
			'articles'		=> $articles,
			'countPages'	=> $countPages,
			'page'			=> $page
		));
	}
	
	public function readAction($id)
	{
		$article = $this->getDoctrine()
                      	 ->getManager()
                      	 ->getRepository('MgnArticleBundle:Article')
                      	 ->findOneArticle($id);
		
		if( $article === null )
        {
            throw $this->createNotFoundException('Article[id='.$id.'] inexistant');
        }

        $countView = $article->getCountViews() +1;
		$article->setCountViews($countView);
		
		$em = $this->getDoctrine()->getManager();
		
		$em->flush();
		
		$message = new Message;

		// On crée le FormBuilder grâce à la méthode du contrôleur.
		$form = $this->createForm(new MessageType, $message);
						 
		return $this->render('MgnArticleBundle:Article:read.html.twig', array(
            'form' => $form->createView(),
			'article' => $article,
		));
	}

	public function listCategoriesAction()
	{
		$categories = $this->getDoctrine()
                      	 ->getManager()
                      	 ->getRepository('MgnArticleBundle:Category')
                      	 ->findBy(
				            array(),                 // Pas de critère
				            array('name' => 'ASC'), // On tri par date décroissante
				            NULL,       // On sélectionne $nb_articles_page articles
				            NULL                  // A partir du $offset ième
				        );
		 
		return $this->render('MgnArticleBundle:Categories:list.html.twig', array(
		'categories' => $categories // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
		));
	}

	public function archivesAction($filtre)
	{
		if ($filtre == 'all')
		{
			$articles = $this->getDoctrine()
                      	 ->getManager()
                      	 ->getRepository('MgnArticleBundle:Article')
                      	 ->findBy(
				            array('status' => 'publish'),                 // Pas de critère
				            array('dateTop' => 'DESC'), // On tri par date décroissante
				            NULL,       // On sélectionne $nb_articles_page articles
				            NULL                  // A partir du $offset ième
				        );
		}
		else
		{
			$articles = $this->getDoctrine()
                      	 ->getManager()
                      	 ->getRepository('MgnArticleBundle:Article')
                      	 ->findArticlesByCategorySlug($filtre);
		}

        $categories = $this->getDoctrine()
                      	 ->getManager()
                      	 ->getRepository('MgnArticleBundle:Category')
                      	 ->findAll();
			
		return $this->render('MgnArticleBundle:Article:archives.html.twig', array(
			'articles' => $articles,
			'categories' => $categories,
			'filtre' => $filtre,
		));
	}
}
