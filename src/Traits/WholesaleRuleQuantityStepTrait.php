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

trait WholesaleRuleQuantityStepTrait
{
    /**
     * @var Collection|QuantityStepRuleInterface[]
     * @psalm-var Collection<array-key, QuantityStepRuleInterface>
     */
    protected $skyBoundTechWholesaleQuantityStepRules;

    public function initWholesaleRuleQuantityStepTrait()
    {
        $this->skyBoundTechWholesaleQuantityStepRules = new ArrayCollection();
    }

    public function addQuantityStepRule(QuantityStepRuleInterface $quantityStepRule): void
    {
        if ($this->skyBoundTechWholesaleQuantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->skyBoundTechWholesaleQuantityStepRules->add($quantityStepRule);
        $quantityStepRule->setRuleset($this);
    }

    public function removeQuantityStepRule(QuantityStepRuleInterface $quantityStepRule): void
    {
        if (!$this->skyBoundTechWholesaleQuantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->skyBoundTechWholesaleQuantityStepRules->removeElement($quantityStepRule);
    }

    public function hasQuantityStepRule(QuantityStepRuleInterface $quantityStepRule): bool
    {
        return $this->skyBoundTechWholesaleQuantityStepRules->contains($quantityStepRule);
    }

    public function getQuantityStepRules(): Collection
    {
        return $this->skyBoundTechWholesaleQuantityStepRules;
    }
}
