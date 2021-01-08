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
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ProductTaxon;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\Taxon;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleset;

final class WholesaleRulesetCreateType extends AbstractResourceType
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(
        string $dataClass,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($dataClass);
        $this->entityManager = $entityManager;
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
                        'Global' => 'ruleset_scope_global',
                        'Product Taxanomy' => 'ruleset_scope_product_taxonomy',
                        'Product' => 'ruleset_scope_product',
                        'Product Variant' => 'ruleset_scope_product_variant',
                    ],
                ]
            )
            ->add(
                'type',
                ChoiceType::class,
                [
                    'choices' => [
                        'Quantity Step' => 'quantity_step',
                        'Tiered Pricing' => 'tiered_pricing',
                        'Backorder' => 'backorder',
                        'Minimum/Maximum Order' => 'min_max_order',
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

                    if ($this->entityHasRecords(ProductTaxon::class) !== null) {
                        $form->add(
                            'rulesetTaxons',
                            EntityType::class,
                            [
                                'multiple' => true,
                                'class' => Taxon::class,
                                'by_reference' => 'false',
                                'choice_label' => 'code',
                            ]
                        );
                    }
                }
            )
        ;
    }

    public function entityHasRecords(string $entityName): ?array
    {
        $repository = $this->entityManager->getRepository($entityName);

        return $repository->findAll();
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => WholesaleRuleset::class,
            ]
        );
    }
}
