<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of FeedbackController
 *
 * @author SakyHank
 */
class FeedbackController extends Controller{
    
    public function selectOneFeedbackAction(){
        $em = $this->getDoctrine()->getManager();
        $feedback = $em->getRepository('ProjectLineOfWorkBundle:Feedback')->random();
        return $this->render('ProjectLineOfWorkBundle:Feedback:selectOneFeedback.html.twig',array(
            'feedback'=> $feedback
        ));
    }
}
