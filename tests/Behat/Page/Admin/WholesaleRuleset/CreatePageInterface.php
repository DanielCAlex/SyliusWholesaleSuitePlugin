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

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Page\Admin\WholesaleRuleset;

use Sylius\Behat\Page\Admin\Crud\CreatePageInterface as BaseCreatePageInterface;


interface CreatePageInterface extends BaseCreatePageInterface
{
    public function fillField(string $field, string $value): void;

    public function fillName(string $name): void;

    public function selectScope(string $scope): void;

    public function selectType(string $type): void;

    public function fillDescription(string $description): void;

    public function disable(): void;

    public function enable(): void;

    public function find(string $desiredText): void;
}
