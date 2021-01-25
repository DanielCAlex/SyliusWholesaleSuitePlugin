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

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext as BaseMinkContext;
use Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Page\Admin\WholesaleRuleset\CreatePageInterface;

final class WholesaleSuiteRulesetContext extends BaseMinkContext implements Context
{

    /** @var CreatePageInterface */
    protected $createPage;

    public function __construct(CreatePageInterface $createPage)
    {
        $this->createPage = $createPage;
    }

    /**
     * @When I go to the create Wholesale Ruleset page
     */
    public function iGoToTheCreateWholesaleRulesetPage(): void
    {
        $this->createPage->open();
    }

    /**
     * @When I select the scope :scope
     */
    public function iSelectTheScope($scope)
    {
        $this->createPage->selectScope($scope);
    }

    /**
     * @When I select the type :type
     */
    public function iSelectTheType($scope)
    {
        $this->createPage->selectType($scope);
    }
}
