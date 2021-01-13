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

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;

final class ProductVariantAutocompleteChoiceType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'resource' => 'sylius.product_variant',
                'choice_name' => 'name',
                'choice_value' => 'code',
            ]
        );
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['remote_criteria_type'] = 'contains';
        $view->vars['remote_criteria_name'] = 'phrase';
    }

    public function getBlockPrefix(): string
    {
        return 'skyboundtech_product_variant_autocomplete_choice';
    }

    public function getParent(): string
    {
        return ResourceAutocompleteChoiceType::class;
    }
}
