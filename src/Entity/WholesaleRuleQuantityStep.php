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
    /** @var bool */
    protected $enabled;
    /** @var WholesaleRuleset */
    protected $ruleset;

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

    public function getDescription(): string
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

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function setRuleset(WholesaleRuleset $ruleset): void
    {
        $this->ruleset = $ruleset;
    }
}
