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
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Resource\Model\ResourceInterface;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\Taxon as SkyBoundTechSyliusTaxonExtension;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\Product as SkyBoundTechSyliusProductExtension;

class WholesaleRuleset extends BaseEntity implements ResourceInterface
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string */
    protected $type;
    /** @var string */
    protected $scope;
    /** @var string|null */
    protected $description;
    /** @var boolean */
    protected $isEnabled;

    /** @var ArrayCollection|SkyBoundTechSyliusTaxonExtension */
    protected $rulesetTaxons;

    /** @var ArrayCollection|SkyBoundTechSyliusProductExtension */
    protected $rulesetProducts;


    public function __construct()
    {
        $this->rulesetTaxons = new ArrayCollection();
        $this->rulesetProducts = new ArrayCollection();
    }

    public function addRulesetTaxon(SkyBoundTechSyliusTaxonExtension $taxon): void
    {
        if ($this->rulesetTaxons->contains($taxon)) {
            return;
        }
        $this->rulesetTaxons->add($taxon);
        $taxon->addSkyBoundTechWholesaleRuleset($this);
    }

    public function removeRulesetTaxon(SkyBoundTechSyliusTaxonExtension $taxon): void
    {
        if (!$this->rulesetTaxons->contains($taxon)) {
            return;
        }
        $this->rulesetTaxons->removeElement($taxon);
        $taxon->removeSkyBoundTechWholesaleRuleset($this);
    }

    public function getRulesetTaxons(): ?Collection
    {
        return $this->rulesetTaxons;
    }

    public function addRulesetProduct(SkyBoundTechSyliusProductExtension $product): void
    {
        if ($this->rulesetTaxons->contains($product)) {
            return;
        }
        $this->rulesetTaxons->add($product);
        $product->addSkyBoundTechWholesaleRuleset($this);
    }

    public function removeRulesetProduct(SkyBoundTechSyliusProductExtension $product): void
    {
        if (!$this->rulesetTaxons->contains($product)) {
            return;
        }
        $this->rulesetTaxons->removeElement($product);
        $product->removeSkyBoundTechWholesaleRuleset($this);
    }

    public function getRulesetProducts(): ?Collection
    {
        return $this->rulesetProducts;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param string $scope
     */
    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isEnabled(): ?bool
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     */
    public function setIsEnabled(bool $isEnabled): void
    {
        $this->isEnabled = $isEnabled;
    }
}
