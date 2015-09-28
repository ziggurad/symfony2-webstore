<?php

namespace WebstoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use WebstoreBundle\Entity\ProductRepository;

class ProductChoices extends AbstractType
{
    /** @var ProductRepository */
    private $productRepository;

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'product_choices';
    }

    public function setProductRepository($productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'products',
                'entity',
                array(
                    'class' => 'WebstoreBundle\Entity\Product',
                    'choice_label' => 'name',
                    'required' => true,
                    'expanded' => true,
                )
            )
            ->add('save', 'submit');
    }
}
