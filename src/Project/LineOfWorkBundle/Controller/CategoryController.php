<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Project\LineOfWorkBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of CategoryController
 *
 * @author SakyHank
 */
class CategoryController extends Controller {
    
    public function showAction($slug, $page){
        $em = $this->getDoctrine()->getManager();
        
        $category = $em->getRepository('ProjectLineOfWorkBundle:Category')->findOneBy(
                array('slug'=>$slug));
        
        if(!$category){
            throw $this->createNotFoundException('Unable to find Category entity');
        }
        
        $jobs_per_page = $this->container->getParameter('max_jobs_on_category');
        
        $total_jobs = $em->getRepository('ProjectLineOfWorkBundle:Job')->countActiveJobs($category->getId());
        
        $last_page = ceil($total_jobs / $jobs_per_page);
        
        $previous_page = $page > 1 ? $page -1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;
        
        $category->setActiveJobs($em->getRepository('ProjectLineOfWorkBundle:Job')
                 ->getActiveJobs($category->getId(),$jobs_per_page, ($page-1)*$jobs_per_page));
        
        return $this->render('ProjectLineOfWorkBundle:Category:show.html.twig',array(
            'category' => $category,
            'last_page' => $last_page,
            'previous_page' => $previous_page,
            'current_page' => $page,
            'next_page' => $next_page,
            'total_jobs' => $total_jobs,
            'jobs_per_page'=>$jobs_per_page
        ));         
    }
    
    public function listAction(){
        
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ProjectLineOfWorkBundle:Category')->findAll();
        
        if(!$categories){
            throw $this->createNotFoundException('Unable to find Category entity');
        }
        
        return $this->render('ProjectLineOfWorkBundle:Category:list.html.twig',array(
            'categories' =>$categories
        ));
    }
    
    public function optionListAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('ProjectLineOfWorkBundle:Category')->findAll();
        
        if(!$categories){
            throw $this->createNotFoundException('Unable to find Category entity');
        }
        
        return $this->render('ProjectLineOfWorkBundle:Category:option-list.html.twig',array(
            'categories' =>$categories
        ));
    }
}
