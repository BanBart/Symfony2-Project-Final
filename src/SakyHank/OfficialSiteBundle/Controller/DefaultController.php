<?php

namespace SakyHank\OfficialSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SakyHankOfficialSiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
