<?php

namespace Mgn\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Mgn\CoreBundle\Form\ParametersSiteType;
use Mgn\CoreBundle\Form\ParametersUsersType;
use Mgn\CoreBundle\Form\ParametersArticlesType;
use Mgn\CoreBundle\Form\ParametersForumsType;


use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ParametersController extends Controller
{
    public function siteAction()
    {
    	if (!$this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
        {
			throw new AccessDeniedException('Vous devez disposer des droits SuperAdmin');
		}

		$config = $this->getDoctrine()
                      	 ->getManager()
                         ->getRepository('MgnCoreBundle:Config')
                         ->findOneBy(array('cms' => 'mutagene'));

		// On crée le FormBuilder grâce à la méthode du contrôleur.
		$form = $this->createForm(new ParametersSiteType, $config);

		// On récupère le formulaire et on le traite
		$request = $this->get('request');

		// On vérifie qu'elle est de type « POST ».
	    if( $request->getMethod() == 'POST' )
	    {
	        // On fait le lien Requête <-> Formulaire.
	        $form->bind($request);
	
	        // On vérifie que les valeurs rentrées sont correctes.
	        if( $form->isValid() )
	        {
	            // On l'enregistre notre objet $cateforie dans la base de données.
	            $em = $this->getDoctrine()->getManager();

				$em->flush();
				
				//message de confirmation
				$this->get('session')->getFlashBag()->add('success', 'Les paramètres du site ont bien été mis à jour.');
				
				// On redirige vers la page d'accueil, par exemple.
	            return $this->redirect( $this->generateUrl('mgn_admin_core_parameters_site'));
	        }
	    }

		return $this->render('MgnCoreBundle:Parameters:site.html.twig', array(
			'form' => $form->createView(),
		));
    }

    public function usersAction()
    {
    	if (!$this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
        {
			throw new AccessDeniedException('Vous devez disposer des droits SuperAdmin');
		}

		$config = $this->getDoctrine()
                      	 ->getManager()
                         ->getRepository('MgnCoreBundle:Config')
                         ->findOneBy(array('cms' => 'mutagene'));

		// On crée le FormBuilder grâce à la méthode du contrôleur.
		$form = $this->createForm(new ParametersUsersType, $config);

		// On récupère le formulaire et on le traite
		$request = $this->get('request');

		// On vérifie qu'elle est de type « POST ».
	    if( $request->getMethod() == 'POST' )
	    {
	        // On fait le lien Requête <-> Formulaire.
	        $form->bind($request);
	
	        // On vérifie que les valeurs rentrées sont correctes.
	        if( $form->isValid() )
	        {
	            // On l'enregistre notre objet $cateforie dans la base de données.
	            $em = $this->getDoctrine()->getManager();

				$em->flush();
				
				//message de confirmation
				$this->get('session')->getFlashBag()->add('success', 'Les paramètres des utilisateurs ont bien été mis à jour.');
				
				// On redirige vers la page d'accueil, par exemple.
	            return $this->redirect( $this->generateUrl('mgn_admin_core_parameters_users'));
	        }
	    }

		return $this->render('MgnCoreBundle:Parameters:users.html.twig', array(
			'form' => $form->createView(),
		));
    }

    public function forumsAction()
    {
    	if (!$this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
        {
			throw new AccessDeniedException('Vous devez disposer des droits SuperAdmin');
		}

		$config = $this->getDoctrine()
                      	 ->getManager()
                         ->getRepository('MgnCoreBundle:Config')
                         ->findOneBy(array('cms' => 'mutagene'));

		// On crée le FormBuilder grâce à la méthode du contrôleur.
		$form = $this->createForm(new ParametersForumsType, $config);

		// On récupère le formulaire et on le traite
		$request = $this->get('request');

		// On vérifie qu'elle est de type « POST ».
	    if( $request->getMethod() == 'POST' )
	    {
	        // On fait le lien Requête <-> Formulaire.
	        $form->bind($request);
	
	        // On vérifie que les valeurs rentrées sont correctes.
	        if( $form->isValid() )
	        {
	            // On l'enregistre notre objet $cateforie dans la base de données.
	            $em = $this->getDoctrine()->getManager();

				$em->flush();
				
				//message de confirmation
				$this->get('session')->getFlashBag()->add('success', 'Les paramètres des forums ont bien été mis à jour.');
				
				// On redirige vers la page d'accueil, par exemple.
	            return $this->redirect( $this->generateUrl('mgn_admin_core_parameters_forums'));
	        }
	    }

		return $this->render('MgnCoreBundle:Parameters:forums.html.twig', array(
			'form' => $form->createView(),
		));
    }

    public function articlesAction()
    {
    	if (!$this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
        {
			throw new AccessDeniedException('Vous devez disposer des droits SuperAdmin');
		}

		$config = $this->getDoctrine()
                      	 ->getManager()
                         ->getRepository('MgnCoreBundle:Config')
                         ->findOneBy(array('cms' => 'mutagene'));

		// On crée le FormBuilder grâce à la méthode du contrôleur.
		$form = $this->createForm(new ParametersArticlesType, $config);

		// On récupère le formulaire et on le traite
		$request = $this->get('request');

		// On vérifie qu'elle est de type « POST ».
	    if( $request->getMethod() == 'POST' )
	    {
	        // On fait le lien Requête <-> Formulaire.
	        $form->bind($request);
	
	        // On vérifie que les valeurs rentrées sont correctes.
	        if( $form->isValid() )
	        {
	            // On l'enregistre notre objet $cateforie dans la base de données.
	            $em = $this->getDoctrine()->getManager();

				$em->flush();
				
				//message de confirmation
				$this->get('session')->getFlashBag()->add('success', 'Les paramètres des articles ont bien été mis à jour.');
				
				// On redirige vers la page d'accueil, par exemple.
	            return $this->redirect( $this->generateUrl('mgn_admin_core_parameters_articles'));
	        }
	    }

		return $this->render('MgnCoreBundle:Parameters:articles.html.twig', array(
			'form' => $form->createView(),
		));
    }
}
