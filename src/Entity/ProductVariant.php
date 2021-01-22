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

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Traits\ProductVariantWholesaleRulesetTrait;

class ProductVariant extends BaseProductVariant implements ProductVariantInterface
{
    use ProductVariantWholesaleRulesetTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initWholesaleRulesetTrait();
    }

    public function getDescriptor(string $pathDelimiter = ' / '): string
    {
        return sprintf(
            '%s%s%s',
            $this->getProduct()->getName(),
            $pathDelimiter,
            $this->getName()
        );
    }
}
