<?php

namespace Mgn\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Mgn\UserBundle\Entity\User;
use Mgn\UserBundle\Form\UserType;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $user = new User;

        $formRegister = $this->createForm(new UserType, $user);

        $request = $this->get('request');

        // gestion de l'inscription
        if ($request->getMethod() == 'POST')
        {
            $formRegister->bind($request);

            if ($formRegister->isValid())
            {
                $em = $this->getDoctrine()->getManager();

                $factory = $this->get('security.encoder_factory');

                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);

                $user->setConfirmationToken(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));

                $config = $this->container->get('mgn.config');

                $user->setTheme($config->get('theme'));

                $em->persist($user);
                $em->flush();

                $translator = $this->get('translator');

                $message = \Swift_Message::newInstance()
                    ->setSubject('['.$config->get('siteTitle').'] '.$translator->trans('user.mail.register.subject'))
                    ->setFrom($config->get('email'))
                    ->setTo($user->getEmail())
                    ->setBody($this->renderView('MgnUserBundle:Registration:email.txt.twig', array(
                            'username' => $user->getUsername(),
                            'confirmationToken' => $user->getConfirmationToken(),
                        )))
                ;
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->add('success', $translator->trans('registration.register.flash.confirm'));

                return $this->render('MgnUserBundle:Registration:register_confirm.html.twig', array(
                ));
            }
        }

        // gestion de la connection
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('MgnUserBundle:Security:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
            'formRegister' => $formRegister->createView(),
        ));
    }
}
