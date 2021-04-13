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
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext as BaseMinkContext;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Taxonomy\Factory\TaxonFactoryInterface;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;
use Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Page\Admin\WholesaleRuleset\CreatePageInterface;

final class WholesaleSuiteRulesetContext extends BaseMinkContext implements Context
{
    /** @var CreatePageInterface */
    protected $createPage;
    /**
     * @var TaxonFactoryInterface
     */
    private $taxonFactory;
    /**
     * @var TaxonRepositoryInterface
     */
    private $taxonRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        CreatePageInterface $createPage,
        TaxonFactoryInterface $taxonFactory,
        TaxonRepositoryInterface $taxonRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->createPage = $createPage;
        $this->taxonFactory = $taxonFactory;
        $this->taxonRepository = $taxonRepository;
        $this->entityManager = $entityManager;
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
    public function iFillRulesetNameWith($rulesetName): void
    {
        $this->createPage->fillRulesetName($rulesetName);
    }

    /**
     * @When I fill the ruleset description with :rulesetDescription
     */
    public function iFillTheRulesetDescriptionWith($rulesetDescription): void
    {
        $this->createPage->fillRulesetDescription($rulesetDescription);
    }

    /**
     * @When I click the :tab tab
     */
    public function iClickTheTab(string $tab): void
    {
        $this->createPage->clickTab($tab);
    }

    /**
     * @When I fill rule name with :name
     */
    public function iFillRuleNameWith(string $name): void
    {
        $this->createPage->fillRuleName($name);
    }

    /**
     * @When I fill the rule description with :description
     */
    public function iFillTheRuleDescriptionWith(string $description): void
    {
        $this->createPage->fillRuleDescription($description);
    }

    /**
     * @When I choose the rule scope :arg1
     */
    public function iChooseTheRuleScope($arg1): void
    {
        throw new PendingException();
    }

    /**
     * @When I click the add rule button for the Quantity Step Rules by Taxonomy tab
     */
    public function addRuleForQuantityStepRulesByTaxonomy()
    {
        $this->createPage->addQuantityStepRule('taxonomy');
    }

    /**
     * @When I click the add rule button for the Quantity Step Rules by Product tab
     */
    public function addRuleForQuantityStepRulesByProduct()
    {
        $this->createPage->addQuantityStepRule('product');
    }

    /**
     * @When I click the add rule button for the Quantity Step Rules by Product Variant tab
     */
    public function addRuleForQuantityStepRulesByProductVariant()
    {
        $this->createPage->addQuantityStepRule('product-variant');
    }

    /**
     * @Given a taxon named :name exists
     */
    public function aTaxonNamedExists($name)
    {
        /** @var TaxonInterface $taxon */
        $taxon = $this->taxonFactory->createNew();

        $loweredTaxonName = mb_strtolower($name);
        $taxonCode = str_replace(' ', '_', $loweredTaxonName);
        $taxonSlug = str_replace(' ', '-', $loweredTaxonName);

        $taxon->setName($name);
        $taxon->setCode($taxonCode);
        $taxon->setSlug($taxonSlug);
        $this->entityManager->persist($taxon);
        $this->entityManager->flush();
    }

    /**
     * @Then I select the quantity step rule taxon :taxon
     */
    public function iSelectTheQuantityStepRuleTaxon($taxon)
    {
        $this->createPage->addTaxon($taxon);
    }

    /**
     * @Then I enable the rule
     */
    public function iEnableTheRule()
    {
        throw new PendingException();
    }

    /**
     * @Then I add it
     */
    public function iAddIt()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be notified that the rule was successfully created.
     */
    public function iShouldBeNotifiedThatTheRuleWasSuccessfullyCreated()
    {
        throw new PendingException();
    }
}
