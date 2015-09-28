<?php

namespace WebstoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShoppingCart.
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebstoreBundle\Entity\ShoppingCartRepository")
 */
class ShoppingCart
{
    public function __construct()
    {
        $this->dateTimeAdd = new \DateTime();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     */
    private $product;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTimeAdd", type="datetime")
     */
    private $dateTimeAdd;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customer.
     *
     * @param \WebstoreBundle\Entity\Customer
     *
     * @return ShoppingCart
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer.
     *
     * @return \WebstoreBundle\Entity\Product
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set product.
     *
     * @param \WebstoreBundle\Entity\Product
     *
     * @return ShoppingCart
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product.
     *
     * @return \WebstoreBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set dateTimeAdd.
     *
     * @param \DateTime $dateTimeAdd
     *
     * @return ShoppingCart
     */
    public function setDateTimeAdd($dateTimeAdd)
    {
        $this->dateTimeAdd = $dateTimeAdd;

        return $this;
    }

    /**
     * Get dateTimeAdd.
     *
     * @return \DateTime
     */
    public function getDateTimeAdd()
    {
        return $this->dateTimeAdd;
    }
}
