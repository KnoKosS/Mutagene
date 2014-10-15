<?php
namespace Mgn\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mgn\MediaBundle\Entity\Picture;
use Mgn\MediaBundle\Form\PictureType;

class ArticleController extends Controller
{
	public function addPictureAction()
	{
		$em = $this->getDoctrine()->getManager();

		$user = $this->container->get('security.context')->getToken()->getUser();

		$picture = new Picture;

        $form = $this->createForm(new PictureType, $picture);

        $request = $this->get('request');

	    // On vérifie qu'elle est de type « POST ».
	    if( $request->getMethod() == 'POST' )
	    {
	        // On fait le lien Requête <-> Formulaire.
	        $form->bind($request);
	
	        // On vérifie que les valeurs rentrées sont correctes.
	        // (Nous verrons la validation des objets en détail plus bas dans ce chapitre.)
	        if( $form->isValid() )
	        {
	            if ($picture->getExtension() == null)
	            {
	            	$this->get('session')->getFlashBag()->add('error', 'Vous devez sélectionner une image.');

	            	return $this->render('MgnMediaBundle:Admin:addPicture.html.twig', array(
			            'form' => $form->createView(),
					));
	            }

	            $picture->setUserIdForName($user->getId());
	            $picture->setUserUpload($user->getId());
	            $picture->setUserIp($request->getClientIp());

	            $extension = $picture->getExtension();

	            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'gif' && $extension != 'png' && $extension != 'bmp')
	            {
				    throw $this->createNotFoundException('Extension incorrect');
				}

				$picture->getGallery()->setCountPicture($picture->getGallery()->getCountPicture()+1);

	            $em->persist($picture);
	            $em->flush();

	            $baseurl = $request->getScheme().'://'.$request->getHttpHost().'/';

	            $url = $baseurl.$picture->getWebPath();

	            $this->get('session')->getFlashBag()->add('success', 'L\'image à bien été uploadé.');

				return $this->render('MgnMediaBundle:Admin:pictureArticle.html.twig', array(
		            'url' => $url,
				));
	        }
	    }

        return $this->render('MgnMediaBundle:Admin:addPictureArticle.html.twig', array(
			'form' => $form->createView(),
		));
	}
}