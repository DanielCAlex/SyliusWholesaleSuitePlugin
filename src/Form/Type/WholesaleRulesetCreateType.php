<?php
/*
 * This file was created by a developer at SkyBound Tech.
 * @author Daniel Alexandre <daniel.alexandre@skyboundtech.co>
 *
 * (c) SkyBound Tech
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Form\Type;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Sylius\Component\Core\Model\Taxon;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\ProductVariant;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\TaxonomyBundle\Form\Type\TaxonAutocompleteChoiceType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductAutocompleteChoiceType;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Services\EntityHelperInterface;

final class WholesaleRulesetCreateType extends AbstractResourceType
{

    /**
     * @var EntityHelperInterface
     */
    protected $entityHelper;

    public function __construct(
        string $dataClass,
        EntityHelperInterface $entityHelper,
    ) {
        parent::__construct($dataClass);
        $this->entityHelper = $entityHelper;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add(
                'scope',
                ChoiceType::class,
                [
                    'choices' => [
                        'Global' => 'Global',
                        'Product Taxonomy' => 'Product Taxonomy',
                        'Product' => 'Product',
                        'Product Variant' => 'Product Variant',
                    ],
                ]
            )
            ->add(
                'type',
                ChoiceType::class,
                [
                    'choices' => [
                        'Quantity Step' => 'Quantity Step',
                        'Tiered Pricing' => 'Tiered Pricing',
                        'Backorder' => 'Backorder',
                        'Minimum/Maximum Order' => 'Min or Max Order',
                    ],
                ]
            )
            ->add('description', TextareaType::class)
            ->add(
                'isEnabled',
                null,
                [
                    'label' => 'Enabled?',
                ]
            )
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {
                    $form = $event->getForm();

                    if ($this->entityHelper->entityHasRecords(Taxon::class) !== null) {
                        $form->add(
                            'rulesetTaxons',
                            TaxonAutocompleteChoiceType::class,
                            [
                                'multiple' => true,
                                'by_reference' => false,
                                'required' => true,
                            ]
                        );
                    }

                    if ($this->entityHelper->entityHasRecords(Product::class)) {
                        $form->add(
                            'rulesetProducts',
                            ProductAutocompleteChoiceType::class,
                            [
                                'multiple' => true,
                                'by_reference' => false,
                                'required' => true,
                            ]
                        );
                    }

                    if ($this->entityHelper->entityHasRecords(ProductVariant::class)) {
                        $form->add(
                            'rulesetProductVariants',
                            ProductVariantAutocompleteChoiceType::class,
                            [
                                'multiple' => true,
                                'by_reference' => false,
                                'required' => true,
//                                'class' => ProductVariant::class,
//                                'choice_label' => 'code',
                            ]
                        );
                    }
                }
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'validation_groups' => [
                    'sylius',
                ],
            ]
        );
    }
}
