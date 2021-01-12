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

class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    public function fillField(string $field, string $value): void
    {
        $this->getDocument()->fillField($field, $value);
    }

    public function fillName(string $name): void
    {
        $this->getDocument()->fillField('Name', $name);
    }

    public function selectScope(string $scope): void
    {
        $this->getDocument()->selectFieldOption('Scope', $scope);
    }

    public function fillDescription(string $description): void
    {
        $this->getDocument()->fillField('description', $description);
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

}
