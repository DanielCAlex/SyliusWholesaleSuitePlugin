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

namespace spec\SkyBoundTech\SyliusWholesaleSuitePlugin\Entity;

use PhpSpec\ObjectBehavior;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\BaseEntity;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleQuantityStepInterface;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class WholesaleRuleQuantityStepSpec extends ObjectBehavior
{
    public function it_is_a_resource(): void
    {
        $this->shouldHaveType(ResourceInterface::class);
    }

    public function it_extends_base_entity(): void
    {
        $this->shouldBeAnInstanceOf(BaseEntity::class);
    }

    public function it_implements_wholesale_rule_quantity_step_interface(): void
    {
        $this->shouldImplement(WholesaleRuleQuantityStepInterface::class);
    }

    public function it_has_a_scope(): void
    {
        $this->setScope('Taxonomy');
        $this->getScope()->shouldReturn('Taxonomy');
        $this->getScope()->shouldNotReturn('Product');
    }

    public function it_toggles(): void
    {
        $this->setEnabled(false);
        $this->isEnabled()->shouldReturn(false);
        $this->setEnabled(true);
        $this->isEnabled()->shouldReturn(true);
    }

    public function it_associates_taxons(
        TaxonInterface $taxonOne,
        TaxonInterface $taxonTwo
    ): void {
        $this->addTaxon($taxonOne);
        $this->hasTaxon($taxonOne)->shouldReturn(true);

        $this->addTaxon($taxonTwo);
        $this->hasTaxon($taxonTwo)->shouldReturn(true);

        $this->removeTaxon($taxonOne);
        $this->hasTaxon($taxonOne)->shouldReturn(false);
    }

    public function it_has_no_taxons_by_default(): void
    {
        $this->getTaxons()->toArray()->shouldReturn([]);
    }

    public function it_associates_products(Product $productOne, Product $productTwo): void
    {
        $this->addProduct($productOne);
        $this->hasProduct($productOne)->shouldReturn(true);
        $this->addProduct($productTwo);
        $this->hasProduct($productTwo)->shouldReturn(true);

        $this->removeProduct($productOne);
        $this->hasProduct($productOne)->shouldReturn(false);
    }

    public function it_has_no_products_by_default(): void
    {
        $this->getProducts()->toArray()->shouldReturn([]);
    }
}
