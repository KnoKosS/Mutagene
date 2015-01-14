<?php

namespace Mgn\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;


use Mgn\CoreBundle\Form\EditorHeadType;
use Mgn\CoreBundle\Form\EditorLayoutType;
use Mgn\CoreBundle\Form\EditorMenuType;
use Mgn\CoreBundle\Form\EditorJavascriptType;
use Mgn\CoreBundle\Form\EditorType;

class ThemeController extends Controller
{
    public function listAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
        {
    			throw new AccessDeniedException('Vous devez disposer des droits SuperAdmin');
    		}

    		return $this->render('MgnCoreBundle:Theme:list.html.twig', array(
          
    		));
    }
}
