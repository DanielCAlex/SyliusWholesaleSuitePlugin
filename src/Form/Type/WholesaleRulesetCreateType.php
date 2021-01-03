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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleset;

class WholesaleRulesetCreateType extends AbstractResourceType
{
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
            ->add('description', TextareaType::class)
        ;
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