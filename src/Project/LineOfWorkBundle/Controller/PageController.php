<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Project\LineOfWorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Project\LineOfWorkBundle\Entity\Enquiry;
use Symfony\Component\HttpFoundation\Request;
use Project\LineOfWorkBundle\Form\JobSearchType;
use Project\LineOfWorkBundle\Entity\Job;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of PageController
 *
 * @author SakyHank
 */
class PageController extends Controller{
    
    public function indexAction(Request $request){
        if($request->get('_route') == 'project_line_of_work_nonlocalized') {
            return $this->redirect($this->generateUrl('project_line_of_work_homepage'));
        }
        return $this->render('ProjectLineOfWorkBundle:Page:index.html.twig');
    }
    
    public function searchAutoAction(Request $request){
        $finder = $this->container->get('fos_elastica.manager');
        $serializer = $this->container->get('serializer');
        if($request->isXmlHttpRequest()){
            $data = $request->request->get('value');
            $results = $finder->getRepository('ProjectLineOfWorkBundle:Job')->findByPartialName($data);
            $result_position = array();
            foreach($results as $result => $val){
                $result_position[] = $val->getPosition();
                $result_position[] = $val->getLocation();
                $result_position[] = $val->getCompany();
            }
            $result = array_values(array_unique($result_position));
            $entity = $serializer->serialize($result,'json');
            $result2 = array('query'=>$entity, 'success'=>true);
            $response = new Response(json_encode($result2));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
       
        }
    }
    
    public function searchAction(Request $request){
        $finder = $this->container->get('fos_elastica.manager');
        
        
        $search = new Job();
        $form = $this->createForm(new JobSearchType(),$search);  
        $form->handleRequest($request);
            if($form->isSubmitted()){
                
                $search2 = $form->getData();
                $result = $finder->getRepository('ProjectLineOfWorkBundle:Job')->search($search2);
                if($result !== null){
                    $request->getSession()->set('result',$result);
                    return $this->redirect($this->generateUrl('project_line_of_work_search_result',array(
                        'result'=>$result
                    )));                           
                }else{
                
                    $request->getSession()->getFlashBag()->add('info','There is no result for your search');
                    return $this->redirect($request->headers->get('referer'));
                }                    
            }  
        
        
        


        return $this->render('ProjectLineOfWorkBundle:Page:search.html.twig',array(
           'form'=>$form->createView() 
        ));
    }

    public function searchResultAction(Request $request){
        $result = $request->getSession()->get('result');
        return $this->render('ProjectLineOfWorkBundle:Page:search_result.html.twig',array(
            'results'=>$result
        ));
    }
    
    public function languageAction(Request $request){
        $language = $request->get('language');
        $route = $request->get('route');
        return $this->redirect($this->generateUrl($route, array(
            '_locale'=>$language
        )));
    }
    
    public function aboutAction(){
        $em = $this->getDoctrine()->getManager();
        $about = $em->getRepository('ProjectLineOfWorkBundle:Article')->findOneBy(array('article_type'=>'About'));
        if($about===null){ throw $this->createNotFoundException('Unable to find about page');}
        return $this->render('ProjectLineOfWorkBundle:Page:about.html.twig',array(
            'about'=>$about
        ));
    }
    
    public function contactAction(Request $request){
        $enquiry = new Enquiry();
        
        $form = $this->createForm('enquiry', $enquiry);
        
        if($request->isMethod('POST')){
            $form->submit($request->request->get($form->getName()));
            if($form->isValid()){
                
                $message = \Swift_Message::newInstance()
                        ->setSubject('Contact enquiry from itlineofwork')
                        ->setFrom('enquires@lineofwork.com')
                        ->setTo($this->container->getParameter('project_lineofwork.emails.contact_email'))
                        ->setBody($this->renderView('ProjectLineOfWorkBundle:Page:contactEmail.txt.twig',
                                array('enquiry'=> $enquiry)));
                $this->get('mailer')->send($message);
                $request->getSession()->getFlashBag()->add('success', 'You successfully sent message to us.');
                return $this->redirect($this->generateUrl('project_line_of_work_homepage'));
            }
            
        }
        
        
        return $this->render('ProjectLineOfWorkBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    public function oddityAction(){
        $em = $this->getDoctrine()->getManager();
        $oddity = $em->getRepository('ProjectLineOfWorkBundle:Article')->random('Oddity');
        return $this->render('ProjectLineOfWorkBundle:Article:oddity.html.twig',array(
            'oddity'=>$oddity
        ));
    }
    
    public function commercialAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $commercial = $em->getRepository('ProjectLineOfWorkBundle:Commercial')->random();
        /*if($request->isXmlHttpRequest()){
            $answer['html'] = $this->forward('ProjectLineOfWorkBundle:Page:commercial')->getContent(); 
            $response = new Response();                                                
            $response->headers->set('Content-type', 'application/json; charset=utf-8');
            $response->setContent(json_encode($answer));
            retu/rn $response;
        //} else{*/
            return $this->render('ProjectLineOfWorkBundle:Commercial:commercial.html.twig',array(
            'commercial'=>$commercial
            ));
        //}    
    }
}
