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

    public function fillRulesetName(string $name): void;

    public function fillRulesetDescription(string $description): void;

    public function fillRuleName(string $name): void;

    public function fillRuleDescription(string $description): void;

    public function chooseRuleScope(string $scope): void;

    public function clickTab(string $tab): void;

    public function disable(): void;

    public function enable(): void;

    public function find(string $desiredText): void;
}
