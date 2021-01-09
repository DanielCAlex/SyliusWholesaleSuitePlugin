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

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\EventListener;

use Symfony\Component\Routing\RouterInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    /**
     * @var RouterInterface
     */
    protected $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('wholesale')
            ->setLabel('Wholesale')
        ;

        $newSubmenu
            ->addChild(
                'wholesale-purchase-rules',
                [
                    'route' => 'skyboundtech_admin_wholesale_ruleset_index',
                ]
            )
            ->setLabel('Wholesale Purchase Rules')
        ;
    }
}
