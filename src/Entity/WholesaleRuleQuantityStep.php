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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class WholesaleRuleQuantityStep extends BaseEntity implements WholesaleRuleQuantityStepInterface, ResourceInterface
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string */
    protected $description;
    /** @var int */
    protected $quantityStep;
    /** @var string */
    protected $scope;
    /** @var bool */
    protected $enabled;
    /** @var WholesaleRulesetInterface */
    protected $ruleset;

    /**
     * @var Collection|TaxonInterface[]
     * @Psalm-var Collection<array-key, TaxonInterface>
     */
    protected $taxons;

    /**
     * @var Collection|Product[]
     * @Psalm-var Collection<array-key, Product>
     */
    protected $products;

    public function __construct()
    {
        $this->taxons = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getQuantityStep(): int
    {
        return $this->quantityStep;
    }

    public function setQuantityStep(int $quantityStep): void
    {
        $this->quantityStep = $quantityStep;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabledStatus): void
    {
        $this->enabled = $enabledStatus;
    }

    public function getRuleset(): WholesaleRulesetInterface
    {
        return $this->getRuleset();
    }

    public function setRuleset(WholesaleRulesetInterface $ruleset): void
    {
        $this->ruleset = $ruleset;
    }

    public function getTaxons(): ?Collection
    {
        return $this->taxons;
    }

    public function addTaxon(TaxonInterface $taxon): void
    {
        if ($this->taxons->contains($taxon)) {
            return;
        }
        $this->taxons->add($taxon);
    }

    public function removeTaxon(TaxonInterface $taxon): void
    {
        if (!$this->taxons->contains($taxon)) {
            return;
        }
        $this->taxons->removeElement($taxon);
    }

    public function hasTaxon(TaxonInterface $taxon): bool
    {
        return $this->taxons->contains($taxon);
    }

    public function getProducts(): ?Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): void
    {
        if ($this->products->contains($product)) {
            return;
        }
        $this->products->add($product);
    }

    public function removeProduct(Product $product): void
    {
        if (!$this->products->contains($product)) {
            return;
        }
        $this->products->removeElement($product);
    }

    public function hasProduct(Product $product): bool
    {
        return $this->products->contains($product);
    }
}
