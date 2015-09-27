<?php

namespace WebstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $form = $this->createForm('product_choices');

        return $this->render('WebstoreBundle:Default:index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
