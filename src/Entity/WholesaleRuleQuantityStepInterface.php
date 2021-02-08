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

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\TaxonInterface;

interface WholesaleRuleQuantityStepInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string $description
     */
    public function setDescription(string $description): void;

    /**
     * @return int
     */
    public function getQuantityStep(): int;

    /**
     * @param int $quantityStep
     */
    public function setQuantityStep(int $quantityStep): void;

    /**
     * @return string
     */
    public function getScope(): string;

    /**
     * @param string $scope
     */
    public function setScope(string $scope): void;

    /**
     * @param bool $enabledStatus
     */
    public function setEnabled(bool $enabledStatus): void;

    /**
     * @return bool
     */
    public function isEnabled(): bool;

    /**
     * @param WholesaleRulesetInterface $ruleset
     */
    public function setRuleset(WholesaleRulesetInterface $ruleset): void;

    /**
     * @return WholesaleRulesetInterface
     */
    public function getRuleset(): WholesaleRulesetInterface;

    /**
     * @return Collection|null
     */
    public function getTaxons(): ?Collection;

    /**
     * @param TaxonInterface $taxon
     */
    public function addTaxon(TaxonInterface $taxon): void;

    /**
     * @param TaxonInterface $taxon
     */
    public function removeTaxon(TaxonInterface $taxon): void;

    /**
     * @param TaxonInterface $taxon
     * @return bool
     */
    public function hasTaxon(TaxonInterface $taxon): bool;

    /**
     * @return Collection|null
     */
    public function getProducts(): ?Collection;

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void;

    /**
     * @param Product $product
     */
    public function removeProduct(Product $product): void;

    /**
     * @param Product $product
     * @return bool
     */
    public function hasProduct(Product $product): bool;
}
