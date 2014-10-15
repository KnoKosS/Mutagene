<?php
//src/Mgn/UserBundle/Listener/LoginListener.php

namespace Mgn\UserBundle\Listener;
 
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.1.x

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Doctrine\ORM\EntityManager;

use Mgn\UserBundle\Entity\User;
 
// use Symfony\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.0.x
 
/**
 * Custom login listener.
 */
class LoginListener
{
  private $context;
  private $em;
 
  /**
   * Constructor
   * 
   * @param SecurityContext $context
   * @param Doctrine        $doctrine
   */
  public function __construct( SecurityContext $context , EntityManager $manager )
  {
    $this->context = $context;
    $this->em = $manager;
  }
 
  /**
   * Do the magic.
   * 
   * @param  Event $event
   */
  public function onSecurityInteractiveLogin( InteractiveLoginEvent $event )
  {
    if ($this->context->getToken())
    {
      $user = $this->context->getToken()->getUser();

      // Nous vérifions que l'utilisateur est bien du bon type pour ne pas appeler getLastActivity() sur un objet autre objet User
      if ($user instanceof User)
      {
        $user->setLastLogin();
        $this->em->flush($user);
      }
    }
  }
 
}