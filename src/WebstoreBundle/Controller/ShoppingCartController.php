<?php

namespace WebstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShoppingCartController extends Controller
{
    public function clearShoppingCartAction()
    {
        $this->get('webstore.customer_model')->clearCustomerShoppingCarts();

        return $this->redirect(
            $this->get('router')->generate('webstore_homepage')
        );
    }
}
