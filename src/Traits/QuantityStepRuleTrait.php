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
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\QuantityStepRuleInterface;

trait QuantityStepRuleTrait
{
    /**
     * @var Collection|QuantityStepRuleInterface[]
     * @psalm-var Collection<array-key, QuantityStepRuleInterface>
     */
    protected $quantityStepRules;

    public function initQuantityStepRuleTrait()
    {
        $this->quantityStepRules = new ArrayCollection();
    }

    public function addQuantityStepRule(QuantityStepRuleInterface $quantityStepRule): void
    {
        if ($this->quantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $quantityStepRule->setRuleset($this);
        $this->quantityStepRules->add($quantityStepRule);
    }

    public function removeQuantityStepRule(QuantityStepRuleInterface $quantityStepRule): void
    {
        if (!$this->quantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->quantityStepRules->removeElement($quantityStepRule);
    }

    public function hasQuantityStepRule(QuantityStepRuleInterface $quantityStepRule): bool
    {
        return $this->quantityStepRules->contains($quantityStepRule);
    }

    public function getQuantityStepRules(): Collection
    {
        return $this->quantityStepRules;
    }

    public function addTaxonQuantityStepRule(QuantityStepRuleInterface $rule): void
    {
        $rule->setRuleset($this);
        $rule->setScope('taxonomy');
        if (!in_array($rule, $this->getTaxonQuantityStepRules()) && 'taxonomy' === $rule->getScope()) {
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

    public function removeTaxonQuantityStepRule(QuantityStepRuleInterface $rule): void
    {
        if (in_array($rule, $this->getTaxonQuantityStepRules()) && 'taxonomy' === $rule->getScope()) {
            $this->quantityStepRules->removeElement($rule);
        }
    }
}
