<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use WebstoreBundle\Entity\Product;

class SampleProductsLoad implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $products = [
            [
                'name' => 'Product 1',
            ],
            [
                'name' => 'Product 2',
            ],
            [
                'name' => 'Product 3',
            ],
        ];

        foreach ($products as $product) {
            $entity = new Product();
            $entity->setName($product['name']);
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
