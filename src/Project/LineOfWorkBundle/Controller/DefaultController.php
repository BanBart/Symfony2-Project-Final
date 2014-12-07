<?php

namespace Project\LineOfWorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjectLineOfWorkBundle:Default:index.html.twig', array('name' => $name));
    }
}
