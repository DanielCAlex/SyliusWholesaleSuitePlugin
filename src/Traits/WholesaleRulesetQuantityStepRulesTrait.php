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

    public function initWholesaleRulesetQuantityStepStepRulesTrait()
    {
        $this->quantityStepRules = new ArrayCollection();
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

    public function addTaxonRule(WholesaleRuleQuantityStepInterface $rule): void
    {
        $rule->setRuleset($this);
        $rule->setScope('taxonomy');
        if (!in_array($rule, $this->getTaxonRules()) && 'taxonomy' === $rule->getScope()) {
            $this->quantityStepRules->add($rule);
        }
    }

    public function getTaxonQuantityStepRules(): array
    {
        return array_filter(
            $this->quantityStepRules->toArray(),
            function ($rule) {
                return 'taxonomy' == $rule->getScope();
            }
        );
    }

    public function removeTaxonQuantityStepRule(WholesaleRuleQuantityStepInterface $rule): void
    {
        if (in_array($rule, $this->getTaxonRules()) && 'taxonomy' === $rule->getScope()) {
            $this->quantityStepRules->removeElement($rule);
        }
    }

    public function addTaxonQuantityStepRule(WholesaleRuleQuantityStepInterface $rule): void
    {
        $rule->setRuleset($this);
        $rule->setScope('product');
        if (!in_array($rule, $this->getTaxonRules()) && 'product' === $rule->getScope()) {
            $this->quantityStepRules->add($rule);
        }
    }
}
