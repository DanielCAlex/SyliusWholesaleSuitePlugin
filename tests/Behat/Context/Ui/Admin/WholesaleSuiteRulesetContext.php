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

use Behat\Behat\Tester\Exception\PendingException;
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
     * @When I fill ruleset name with :rulesetName
     */
    public function iFillRulesetNameWith($rulesetName)
    {
        $this->createPage->fillRulesetName($rulesetName);
    }

    /**
     * @When I fill the ruleset description with :rulesetDescription
     */
    public function iFillTheRulesetDescriptionWith($rulesetDescription)
    {
        $this->createPage->fillRulesetDescription($rulesetDescription);
    }
}
