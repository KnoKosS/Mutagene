<?php

namespace Mgn\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SidebarController extends Controller
{
    public function viewAction()
    {
        return $this->render('MgnCoreBundle:Sidebar:view.html.twig', array(
    		));
    }
}
