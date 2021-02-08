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

use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleQuantityStep;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\TaxonomyBundle\Form\Type\TaxonAutocompleteChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class WholesaleRuleQuantityStepByTaxonomyType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'skyboundtech_sylius_wholesale_suite_plugin.ui.wholesale_rules.rule_name',
                ]
            )
            ->add(
                'description',
                TextareaType::class,
                [
                    'label' => 'skyboundtech_sylius_wholesale_suite_plugin.ui.wholesale_rules.rule_description',
                ]
            )
            ->add(
                'quantityStep',
                IntegerType::class,
                [
                    'label' => 'skyboundtech_sylius_wholesale_suite_plugin.ui.wholesale_rules.quantity_step.quantity',
                ]
            )
            ->add(
                'taxons',
                TaxonAutocompleteChoiceType::class,
                [
                    'multiple' => true,
                    'label' => 'skyboundtech_sylius_wholesale_suite_plugin.ui.wholesale_rules.quantity_step.select_taxons',
                ]
            )
            ->add('enabled');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => WholesaleRuleQuantityStep::class]);
    }
}