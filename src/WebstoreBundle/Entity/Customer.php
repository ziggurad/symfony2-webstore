<?php

namespace WebstoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer.
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebstoreBundle\Entity\CustomerRepository")
 */
class Customer
{
    public function __construct()
    {
        $this->shoppingCarts = new ArrayCollection();
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
     * @var string
     *
     * @ORM\Column(name="sessionId", type="string", length=255)
     */
    private $sessionId;

    /**
     * @ORM\OneToMany(targetEntity="ShoppingCart", mappedBy="customer")
     */
    private $shoppingCarts;

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
     * Set sessionId.
     *
     * @param string $sessionId
     *
     * @return Customer
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId.
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Get shoppingCart.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShoppingCarts()
    {
        return $this->shoppingCarts;
    }
}
