<?php

namespace WebstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WebstoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
