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
use SkyBoundTech\SyliusWholesaleSuitePlugin\Traits\QuantityStepRuleTrait;
use Sylius\Component\Resource\Model\ResourceInterface;

class WholesaleRuleset extends BaseEntity implements ResourceInterface, WholesaleRulesetInterface
{
    use QuantityStepRuleTrait;

    /** @var int */
    protected $id;
    /** @var string */
    protected $name;
    /** @var string|null */
    protected $description;
    /** @var bool */
    protected $enabled;

    public function __construct()
    {
        /* @var  ArrayCollection<array-key, QuantityStepRuleInterface> $this- >quantityStepRules */
        $this->initQuantityStepRuleTrait();
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
}
