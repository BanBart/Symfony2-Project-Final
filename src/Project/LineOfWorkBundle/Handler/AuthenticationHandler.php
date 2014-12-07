<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Handler;


use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

use Symfony\Component\Security\Core\SecurityContextInterface;

use Symfony\Component\Routing\Router;

/**
 * Description of AuthenticationHandler
 *
 * @author SakyHank
 */
class AuthenticationHandler implements  AuthenticationFailureHandlerInterface, 
                                        LogoutSuccessHandlerInterface,
                                        AuthenticationSuccessHandlerInterface{
    
    
    private $router;
    protected $securityContext;
    
    public function __construct(SecurityContextInterface $securityContext, Router $router){
        
        $this->router = $router;
        $this->securityContext = $securityContext;
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token){
        if ($request->isXmlHttpRequest()) {        
            $request->getSession()->getFlashBag()->add('success','You have been sucessfully logged in');
            if($this->securityContext->isGranted('ROLE_ADMIN')){
                $url = $this->router->generate('sonata_admin_dashboard');
            } else {
                $url = $this->router->generate('project_line_of_work_homepage');
            }
            
            $result = array('success' => true,                          
                            'redirect'=> $url,
                            );
            
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
            
        } else { 
            // If the user tried to access a protected resource and was forces to login
            // redirect him back to that resource
            if ($targetPath = $request->getSession()->get('_security.target_path')) {
                $url = $targetPath;
            } else {
                // Otherwise, redirect him to wherever you want
                $url = $this->router->generate('project_line_of_work_homepage');
            }
            $request->getSession()->getFlashBag()->add('success','You have been sucessfully logged in');
            return new RedirectResponse($url);
         
         
        }
    }
    
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        
        if($request->isXmlHttpRequest()){
            $urlForget = $this->router->generate('fos_user_resetting_request');
            $result = array('success' => false, 'message' => $exception->getMessage(), 'urlForget'=>$urlForget);
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }else{
            $referer = $request->headers->get('referer');       
            $request->getSession()->getFlashBag()->add('danger', $exception->getMessage());        
            return new RedirectResponse($referer);
         
         
        }
        
    }

    public function onLogoutSuccess(Request $request) {
        
        
            $request->getSession()->getFlashBag()->add('success', 'You have been successfully logged out');       
            return new RedirectResponse($this->router->generate('project_line_of_work_homepage')); 
        
        
        
    }

//put your code here
}
