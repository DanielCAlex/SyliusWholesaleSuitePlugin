<?php

declare(strict_types=1);

/*
 * This file was created by a developer at SkyBound Tech.
 * @author Daniel Alexandre <daniel.alexandre@skyboundtech.co>
 *
 * (c) SkyBound Tech
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Traits;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleQuantityStepInterface;

trait WholesaleRulesetQuantityStepRulesTrait
{
    /**
     * @var Collection|WholesaleRuleQuantityStepInterface[]
     * @psalm-var Collection<array-key, WholesaleRuleQuantityStepInterface>
     */
    protected $quantityStepRules;

    /**
     * @var Collection|WholesaleRuleQuantityStepInterface[]
     * @psalm-var Collection<array-key, WholesaleRuleQuantityStepInterface>
     */
    protected $quantityStepRulesByTaxon;

    /**
     * @var Collection|WholesaleRuleQuantityStepInterface[]
     * @psalm-var Collection<array-key, WholesaleRuleQuantityStepInterface>
     */
    protected $quantityStepRulesByProduct;

    /**
     * @var Collection|WholesaleRuleQuantityStepInterface[]
     * @psalm-var Collection<array-key, WholesaleRuleQuantityStepInterface>
     */
    protected $quantityStepRulesByProductVariant;

    public function initWholesaleRulesetQuantityStepStepRulesTrait()
    {
        $this->quantityStepRules = new ArrayCollection();
        $this->quantityStepRulesByTaxon = new ArrayCollection();
        $this->quantityStepRulesByProduct = new ArrayCollection();
    }

    public function addQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if ($this->quantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $quantityStepRule->setRuleset($this);
        $this->quantityStepRules->add($quantityStepRule);
    }

    public function removeQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if (!$this->quantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->quantityStepRules->removeElement($quantityStepRule);
    }

    public function hasQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): bool
    {
        return $this->quantityStepRules->contains($quantityStepRule);
    }

    public function getQuantityStepRules(): Collection
    {
        return $this->quantityStepRules;
    }

    public function getQuantityStepRulesByTaxon(): Collection
    {
        return $this->quantityStepRulesByTaxon;
    }

    public function addQuantityStepRuleByTaxon(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if ($this->quantityStepRulesByTaxon->contains($quantityStepRule)) {
            return;
        }
        if ('Taxonomy' !== $quantityStepRule->getScope()) {
            return;
        }
        $this->quantityStepRulesByTaxon->add($quantityStepRule);
    }

    public function removeQuantityStepRuleByTaxon(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if (!$this->quantityStepRulesByTaxon->contains($quantityStepRule)) {
            return;
        }
        $this->quantityStepRulesByTaxon->removeElement($quantityStepRule);
    }

    public function getQuantityStepRulesByProduct(): Collection
    {
        return $this->quantityStepRulesByProduct;
    }

    public function addQuantityStepRuleByProduct(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if ($this->quantityStepRulesByProduct->contains($quantityStepRule)) {
            return;
        }
        if ('Product' !== $quantityStepRule->getScope()) {
            return;
        }
        $this->quantityStepRulesByProduct->add($quantityStepRule);
    }

    public function removeQuantityStepRuleByProduct(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if (!$this->quantityStepRulesByProduct->contains($quantityStepRule)) {
            return;
        }
        $this->quantityStepRulesByProduct->removeElement($quantityStepRule);
    }

    public function getQuantityStepRulesByProductVariant(): ?Collection
    {
        return $this->quantityStepRulesByProductVariant;
    }

    public function addQuantityStepRuleByProductVariant(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if ($this->quantityStepRulesByProductVariant->contains($quantityStepRule)) {
            return;
        }
        if ('Product Variant' !== $quantityStepRule->getScope()) {
            return;
        }
        $this->quantityStepRulesByProductVariant->add($quantityStepRule);
    }

    public function removeQuantityStepRuleByProductVariant(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if (!$this->quantityStepRulesByProductVariant->contains($quantityStepRule)) {
            return;
        }
        $this->quantityStepRulesByProductVariant->removeElement($quantityStepRule);
    }
}
