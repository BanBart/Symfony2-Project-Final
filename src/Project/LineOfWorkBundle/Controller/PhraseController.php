<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of PhraseController
 *
 * @author SakyHank
 */
class PhraseController extends Controller {
    
    public function showAction(){
        $em = $this->getDoctrine()->getManager();
        $phrases = $em->getRepository('ProjectLineOfWorkBundle:Phrase')->findAll();
        return $this->render('ProjectLineOfWorkBundle:Phrase:show.html.twig',array(
           'phrases'=>$phrases 
        ));
    }
    
}
