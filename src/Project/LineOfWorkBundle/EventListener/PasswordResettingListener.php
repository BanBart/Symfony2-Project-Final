<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Description of PasswordResettingListener
 *
 * @author SakyHank
 */
class PasswordResettingListener implements EventSubscriberInterface{
    
    private $router;
    private $session;

    public function __construct(UrlGeneratorInterface $router, Session $session) {
        $this->router = $router;
        $this->session = $session;
    }
    
    public static function getSubscribedEvents() {
        return [
            FOSUserEvents::RESETTING_RESET_SUCCESS => 'onPasswordResettingSuccess',
            FOSUserEvents::CHANGE_PASSWORD_SUCCESS => 'onChangePasswordSuccess'
        ];
    }
    
    public function onPasswordResettingSuccess(FormEvent $event) {
        $url = $this->router->generate('project_line_of_work_homepage');
        $event->setResponse(new RedirectResponse($url));
    }
    
    public function onChangePasswordSuccess(FormEvent $event){
        $url = $this->router->generate('project_line_of_work_user_profile');
        $this->session->getFlashBag()->add('success','You have been sucessfully changed');
        $event->setResponse(new RedirectResponse($url));
    }

}
