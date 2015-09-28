<?php

namespace WebstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm('product_choices');
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('webstore.shopping_cart_model')->addProductToUserShoppingCart($form->getData()['products']);

            return $this->redirect(
                $this->get('router')->generate('webstore_homepage')
            );
        }

        return $this->render('WebstoreBundle:Default:index.html.twig', [
            'shopping_carts' => $this->get('webstore.customer_model')->getCustomerShoppingCarts(),
            'form' => $form->createView(),
        ]);
    }
}
