<?php

namespace Mgn\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$config = $this->container->get('mgn.config');

        return $this->render('MgnAdminBundle:Default:index.html.twig', array(
        ));
    }
}
