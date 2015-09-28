<?php

namespace WebstoreBundle\Model;

use Doctrine\ORM\EntityManager;
use WebstoreBundle\Entity\Product;
use WebstoreBundle\Entity\ShoppingCart;

class ShoppingCartModel
{
    /** @var CustomerModel */
    private $customerModel;

    /** @var EntityManager */
    protected $entityManager;

    /**
     * ShoppingCartModel constructor.
     *
     * @param CustomerModel $customerModel
     * @param EntityManager $entityManager
     */
    public function __construct(CustomerModel $customerModel, EntityManager $entityManager)
    {
        $this->customerModel = $customerModel;
        $this->entityManager = $entityManager;
    }

    public function addProductToUserShoppingCart(Product $product)
    {
        $customer = $this->customerModel->getCustomer();

        $shoppingCart = new ShoppingCart();
        $shoppingCart->setCustomer($customer);
        $shoppingCart->setProduct($product);

        $this->entityManager->persist($shoppingCart);
        $this->entityManager->flush();
    }
}
