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

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class WholesaleRulesetType extends AbstractResourceType
{
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
                'quantityStepRulesByTaxon',
                CollectionType::class,
                [
                    'entry_type' => WholesaleRuleQuantityStepByTaxonType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'mapped' => false,
                ]
            )
            ->add(
                'quantityStepRulesByProduct',
                CollectionType::class,
                [
                    'entry_type' => WholesaleRuleQuantityStepByProductType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'mapped' => false,
                ]
            )
            ->add(
                'quantityStepRulesByProductVariant',
                CollectionType::class,
                [
                    'entry_type' => WholesaleRuleQuantityStepByProductVariantType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'mapped' => false,
                ]
            );
//        $builder->addEventListener(
//            FormEvents::PRE_SUBMIT,
//            function (FormEvent $event) {
//                $ruleset = $event->getData();
//
//                $quantityStepRulesByTaxon = $ruleset['quantityStepRulesByTaxon'];
//                $test = 'yes';
//                $quantityStepRules = [];
//                foreach ($quantityStepRulesByTaxon as $quantityStepRuleByTaxon) {
//                    $ruleTaxons = $quantityStepRuleByTaxon['taxons'];
//                    $ruleTaxons = explode(',', $ruleTaxons);
//                    $quantityStepRuleByTaxon['scope'] = 'taxonomy';
//
//                    $quantityStepRuleByTaxon['taxons'] = $ruleTaxons;
//
//                    array_push($quantityStepRules, $quantityStepRuleByTaxon);
//                }
//            }
//        );
    }
}
