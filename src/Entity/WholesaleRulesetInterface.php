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

interface WholesaleRulesetInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void;

    /**
     * @return bool|null
     */
    public function enabled(): ?bool;

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void;

    /**
     * @return Collection
     */
    public function getQuantityStepRules(): Collection;

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
     * @return Collection
     */
    public function getQuantityStepRulesByTaxon(): Collection;

    /**
     * @param WholesaleRuleQuantityStepInterface $quantityStepRule
     */
    public function addQuantityStepRuleByTaxon(WholesaleRuleQuantityStepInterface $quantityStepRule): void;

    /**
     * @param WholesaleRuleQuantityStepInterface $quantityStepRule
     */
    public function removeQuantityStepRuleByTaxon(WholesaleRuleQuantityStepInterface $quantityStepRule): void;

    /**
     * @return Collection
     */
    public function getQuantityStepRulesByProduct(): Collection;

    /**
     * @param WholesaleRuleQuantityStepInterface $quantityStepRule
     */
    public function addQuantityStepRuleByProduct(WholesaleRuleQuantityStepInterface $quantityStepRule): void;

    /**
     * @param WholesaleRuleQuantityStepInterface $quantityStepRule
     */
    public function removeQuantityStepRuleByProduct(WholesaleRuleQuantityStepInterface $quantityStepRule): void;


}
