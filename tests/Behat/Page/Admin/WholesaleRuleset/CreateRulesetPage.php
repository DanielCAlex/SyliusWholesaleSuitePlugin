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

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Page\Admin\WholesaleRuleset;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;
use Sylius\Behat\Service\AutocompleteHelper;
use Sylius\Component\Core\Model\TaxonInterface;

class CreateRulesetPage extends BaseCreatePage implements CreateRulesetPageInterface
{
    public function fillField(string $field, string $value): void
    {
        $this->getDocument()->fillField($field, $value);
    }

    public function fillRulesetName(string $name): void
    {
        $this->getDocument()->fillField('Ruleset Name', $name);
    }

    public function fillRulesetDescription(string $description): void
    {
        $this->getDocument()->fillField('Ruleset Description', $description);
    }

    public function fillRuleName(string $name): void
    {
        $this->getDocument()->fillField('Rule Name', $name);
    }

    public function fillRuleDescription(string $description): void
    {
        $this->getDocument()->fillField('Rule Description', $description);
    }

    public function chooseRuleScope(string $scope): void
    {
        $this->getDocument()->selectFieldOption('Rule Scope', $scope);
    }

    public function disable(): void
    {
        $this->getDocument()->uncheckField('Enabled?');
    }

    public function enable(): void
    {
        $this->getDocument()->checkField('Enabled?');
    }

    public function find(string $desiredText): void
    {
        $this->getDocument()->hasContent($desiredText);
    }

    public function addQuantityStepRule(string $scope): void
    {
        $this->clickTab('Quantity Step Rules');
        $this->clickTab(sprintf('Quantity Step Rules/%s', $scope));

        $addButton = $this->getDocument()->find(
            'css',
            sprintf(
                'div[data-tab="Quantity Step Rules/%s"] > * a[data-form-collection="add"]',
                $scope
            )
        );

        $addButton->click();
    }

    public function clickTab(string $tab): void
    {
        $tab = $this->getDocument()->find(
            'css',
            sprintf(
                '[data-tab="%s"]',
                $tab
            )
        );

        $tab->click();
    }

    public function addQuantityStepRuleTaxon(TaxonInterface $taxon): void
    {
        $addTaxonsElement = $this->getElement('addQuantityStepRuleTaxon')->getParent();

        AutocompleteHelper::chooseValue($this->getSession(), $addTaxonsElement, $taxon->getName());
    }

    public function enableTaxonQuantitytepRule(): void
    {
        $enableButton = $this->getElement('taxonQuantityStepRuleEnable');
        $enableButton->click();
    }

    protected function getDefinedElements(): array
    {
        return array_merge(
            parent::getDefinedElements(),
            [
                'addQuantityStepRuleTaxon' => '#wholesale_ruleset_taxonQuantityStepRules_0_taxons',
                'taxonQuantityStepRuleEnable' => '#wholesale_ruleset_taxonQuantityStepRules_0_enabled',
            ]
        );
    }
}
