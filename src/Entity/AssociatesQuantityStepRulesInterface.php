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

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Entity;

use Doctrine\Common\Collections\Collection;

interface AssociatesQuantityStepRulesInterface
{
    /**
     * @param WholesaleRuleQuantityStepInterface $quantityStepRule
     */
    public function addQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void;

    /**
     * @param WholesaleRuleQuantityStepInterface $quantityStepRule
     */
    public function removeQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void;

    /**
     * @param WholesaleRuleQuantityStepInterface $quantityStepRule
     * @return bool
     */
    public function hasQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): bool;

    /**
     * @return Collection|null
     */
    public function getQuantityStepRules(): ?Collection;
}
