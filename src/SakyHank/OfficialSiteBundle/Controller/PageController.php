<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SakyHank\OfficialSiteBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of PageController
 *
 * @author SakyHank
 */
class PageController extends Controller{
    public function indexAction(){
        return $this->render('SakyHankOfficialSiteBundle:Page:index.html.twig');
    }
}
