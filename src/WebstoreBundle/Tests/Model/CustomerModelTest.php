<?php

namespace WebstoreBundle\Tests\Model;

use Mockery;
use PHPUnit_Framework_TestCase;
use WebstoreBundle\Model\CustomerModel;

class CustomerModelTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function test_create_customer_from_session()
    {
        $sessionid = md5(microtime());

        $session = Mockery::mock('Symfony\Component\HttpFoundation\Session\Session');
        $session
            ->shouldReceive('getId')
            ->twice()
            ->andReturn($sessionid);

        $customerRepository = Mockery::mock('WebstoreBundle\Entity\CustomerRepository');
        $customerRepository
            ->shouldReceive('findOneBySessionId')
            ->once()
            ->andReturn(false);

        $entityManager = Mockery::mock('Doctrine\ORM\EntityManager');
        $entityManager
            ->shouldReceive('persist')
            ->once();
        $entityManager
            ->shouldReceive('flush')
            ->once();

        $customerModel = new CustomerModel($session, $customerRepository, $entityManager);

        $customer = $customerModel->getCustomer();

        $this->assertEquals($sessionid, $customer->getSessionId());
    }
}