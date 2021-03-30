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

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Entity;

use SkyBoundTech\SyliusWholesaleSuitePlugin\Traits\QuantityStepRuleTrait;
use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements AssociatesQuantityStepRulesInterface
{
    use QuantityStepRuleTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initQuantityStepRuleTrait();
    }
}
