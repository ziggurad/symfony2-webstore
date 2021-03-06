<?php

namespace WebstoreBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use WebstoreBundle\Entity\Customer;
use WebstoreBundle\Entity\CustomerRepository;

class CustomerModel
{
    /** @var Session */
    private $session;

    /** @var CustomerRepository */
    private $customerRepository;

    /** @var EntityManager */
    protected $entityManager;

    /**
     * CustomerModel constructor.
     *
     * @param Session            $session
     * @param CustomerRepository $customerRepository
     * @param EntityManager      $entityManager
     */
    public function __construct(Session $session, CustomerRepository $customerRepository, EntityManager $entityManager)
    {
        $this->session = $session;
        $this->customerRepository = $customerRepository;
        $this->entityManager = $entityManager;
    }

    public function getCustomer()
    {
        if (!$customer = $this->customerRepository->findOneBySessionId($this->session->getId())) {
            $customer = $this->createCustomerFromSession();
        }

        return $customer;
    }

    private function createCustomerFromSession()
    {
        $customer = new Customer();
        $customer->setSessionId($this->session->getId());

        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        return $customer;
    }

    public function getCustomerShoppingCarts()
    {
        $customer = $this->getCustomer();

        return $customer->getShoppingCarts();
    }

    public function clearCustomerShoppingCarts()
    {
        $customer = $this->getCustomer();

        $customer->setSessionId(new ArrayCollection());

        $this->entityManager->persist($customer);
        $this->entityManager->flush();
    }
}
