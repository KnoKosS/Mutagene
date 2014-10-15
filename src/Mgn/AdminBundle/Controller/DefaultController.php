<?php

namespace Mgn\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	return $this->render('MgnAdminBundle:Default:index.html.twig', array(
        ));
    }
}
