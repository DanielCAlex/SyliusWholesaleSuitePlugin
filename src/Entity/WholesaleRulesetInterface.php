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
    public function getId(): ?int;

    public function getName(): ?string;

    public function setName(string $name): void;

    public function getDescription(): ?string;

    public function setDescription(?string $description): void;

    public function enabled(): ?bool;

    public function setEnabled(bool $enabled): void;

    public function getQuantityStepRules(): Collection;

    public function addQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void;

    public function removeQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void;

    public function hasQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): bool;

    public function getTaxonQuantityStepRules(): array;

    public function addTaxonQuantityStepRule(WholesaleRuleQuantityStepInterface $rule): void;

    public function removeTaxonQuantityStepRule(WholesaleRuleQuantityStepInterface $rule): void;
}
