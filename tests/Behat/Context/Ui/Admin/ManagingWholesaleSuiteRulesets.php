<?php

declare(strict_types=1);

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Context\Ui\Admin;

use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

final class ManagingWholesaleSuiteRulesets implements Context
{

    /**
     * @Given the following wholesale rulesets exist
     */
    public function theFollowingWholesaleRulesetsExist(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When I go to the wholesale rulesets list
     */
    public function iGoToTheWholesaleRulesetsList()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        throw new PendingException();
    }
}
