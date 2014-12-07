<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of UserController
 *
 * @author SakyHank
 */
class UserController extends Controller{
    
    public function profileAction(){
        $user = $this->getUser();
        return $this->render('ProjectLineOfWorkBundle:User:profile.html.twig', array(
            'user'=>$user
        ));
    }
    
}
