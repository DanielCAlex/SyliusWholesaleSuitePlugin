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

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Services\EntityHelperInterface;

final class WholesaleRulesetType extends AbstractResourceType
{
    /**
     * @var EntityHelperInterface
     */
    protected $entityHelper;

    public function __construct(
        string $dataClass,
        EntityHelperInterface $entityHelper
    ) {
        parent::__construct($dataClass);
        $this->entityHelper = $entityHelper;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'skyboundtech_sylius_wholesale_suite_plugin.ui.wholesale_rulesets.ruleset_name',
                ]
            )
            ->add(
                'description',
                TextareaType::class,
                [
                    'label' => 'skyboundtech_sylius_wholesale_suite_plugin.ui.wholesale_rulesets.ruleset_description',
                ]
            )
            ->add(
                'enabled',
                null,
                [
                    'label' => 'Enabled?',
                ]
            )
            ->add(
                'quantityStepRules',
                CollectionType::class,
                [
                    'entry_type' => WholesaleRuleQuantityStepType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ]
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
