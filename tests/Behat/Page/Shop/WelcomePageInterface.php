<?php

declare(strict_types=1);

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Page\Shop;

use FriendsOfBehat\PageObjectExtension\Page\SymfonyPageInterface;
use Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Context\Ui\Admin\WelcomeContext;

interface WelcomePageInterface extends SymfonyPageInterface
{
    /**
     * @return string
     */
    public function getGreeting(): string;
}
