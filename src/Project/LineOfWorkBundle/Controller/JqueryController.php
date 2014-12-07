<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of JqueryController
 *
 * @author SakyHank
 */
class JqueryController extends Controller{
    
    public function testAction(){
        return $this->render('ProjectLineOfWorkBundle:Jquery:test.html.twig');
    }
}
