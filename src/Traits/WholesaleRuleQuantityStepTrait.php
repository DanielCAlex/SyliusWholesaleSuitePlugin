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

trait WholesaleRuleQuantityStepTrait
{
    /**
     * @var Collection|WholesaleRuleQuantityStepInterface[]
     * @psalm-var Collection<array-key, WholesaleRuleQuantityStepInterface>
     */
    protected $skyBoundTechWholesaleQuantityStepRules;

    public function initWholesaleRuleQuantityStepTrait()
    {
        $this->skyBoundTechWholesaleQuantityStepRules = new ArrayCollection();
    }

    public function addQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if ($this->skyBoundTechWholesaleQuantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->skyBoundTechWholesaleQuantityStepRules->add($quantityStepRule);
    }

    public function removeQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if (!$this->skyBoundTechWholesaleQuantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->skyBoundTechWholesaleQuantityStepRules->removeElement($quantityStepRule);
    }

    public function hasQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): bool
    {
        return $this->skyBoundTechWholesaleQuantityStepRules->contains($quantityStepRule);
    }

    public function getSkyBoundTechWholesaleQuantityStepRules(): Collection
    {
        return $this->skyBoundTechWholesaleQuantityStepRules;
    }
}
