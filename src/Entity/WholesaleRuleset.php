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
use Sylius\Component\Core\Model\ProductTaxonInterface;

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
    /** @var ArrayCollection|ProductTaxonInterface */
    protected $productTaxons;

    /**
     * @param mixed $productTaxon
     */
    public function addProductTaxon($productTaxon)
    {
        $this->productTaxons->add($productTaxon);
        // uncomment if you want to update other side
        $productTaxon->setWholesaleRuleset($this);
    }

    /**
     * @param mixed $productTaxon
     */
    public function removeProductTaxon($productTaxon)
    {
        $this->productTaxons->removeElement($productTaxon);
        // uncomment if you want to update other side
        $productTaxon->setWholesaleRuleset(null);
    }


    public function getRulesetProductTaxons()
    {
        return $this->productTaxons;
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
