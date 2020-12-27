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

use Doctrine\ORM\EntityManagerInterface;
use Behat\MinkExtension\Context\RawMinkContext;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleset;

final class CreateWholesaleSuiteRulesetsContext extends RawMinkContext
{

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Then the Wholesale Ruleset :rulesetName should appear in the store
     */
    public function theWholesaleRulesetShouldAppearInTheStore($rulesetName)
    {
        $repository = $this->entityManager->getRepository(WholesaleRuleset::class);

        $ruleset = $repository->findOneBy(['name' => $rulesetName]);

        if (!$ruleset) {
            throw new \Exception(
                sprintf(
                    'The ruleset "%s" was not found in the database.',
                    $rulesetName
                )
            );
        }
    }

    /**
     * @When I save it
     */
    public function iSaveIt()
    {
        $page = $this->getSession()->getPage();

        // Regular, boring press button.
        //$page->pressButton('Create');

        // chad do while. The loop should press the button until it is no longer
        // present, because a successful submission would mean it redirects to edit
        do {
            echo 'PRESSING THE SAVE BUTTON UNTIL IT WORKS' . "\n";
            $page->pressButton('Create');
            $this->getSession()->wait(700);
            $buttonIsPresent = $page->findButton('Create') ? true : false;
        } while ($buttonIsPresent === true);
    }
}
