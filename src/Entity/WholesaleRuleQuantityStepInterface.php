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

interface WholesaleRuleQuantityStepInterface
{
    public function getId(): int;

    public function setName(string $name): void;

    public function getName(): string;

    public function setDescription(string $description): void;

    public function getDescription(): ?string;

    public function setQuantityStep(int $quantityStep): void;

    public function getQuantityStep(): int;

    public function setEnabled(bool $enabledStatus): void;

    public function isEnabled(): bool;
}
