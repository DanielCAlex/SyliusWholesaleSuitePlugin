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

class WholesaleRuleset extends BaseEntity implements ResourceInterface, WholesaleRulesetInterface
{
    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string|null */
    protected $description;
    /** @var bool */
    protected $enabled;
    /**
     * @var Collection|WholesaleRuleQuantityStepInterface[]
     * @psalm-var Collection<array-key, WholesaleRuleQuantityStepInterface>
     */
    protected $quantityStepRules;

    public function __construct()
    {
        /* @var  ArrayCollection<array-key, WholesaleRuleQuantityStepInterface> $this- >quantityStepRules */
        $this->quantityStepRules = new ArrayCollection();
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

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function enabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getQuantityStepRules(): array
    {
        return $this->quantityStepRules->toArray();
    }

    public function addQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if ($this->quantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->quantityStepRules->add($quantityStepRule);
        $quantityStepRule->setRuleset($this);
    }

    public function removeQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): void
    {
        if (!$this->quantityStepRules->contains($quantityStepRule)) {
            return;
        }
        $this->quantityStepRules->removeElement($quantityStepRule);
    }

    public function hasQuantityStepRule(WholesaleRuleQuantityStepInterface $quantityStepRule): bool
    {
        if ($this->quantityStepRules->contains($quantityStepRule)) {
            return true;
        } else {
            return false;
        }
    }
}
