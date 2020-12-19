<?php

declare(strict_types=1);

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Page\Admin;

use Behat\Mink\Element\NodeElement;
use Sylius\Behat\Page\Admin\Crud\IndexPageInterface;
use FriendsOfBehat\PageObjectExtension\Page\SymfonyPage;
use FriendsOfBehat\PageObjectExtension\Page\PageInterface;
use Sylius\Behat\Page\Admin\Crud\IndexPage as BaseIndexPage;

final class WholesaleRulesetsIndexPage extends BaseIndexPage implements IndexPageInterface
{
}
