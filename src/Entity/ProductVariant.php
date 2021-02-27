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

use SkyBoundTech\SyliusWholesaleSuitePlugin\Traits\WholesaleRuleQuantityStepTrait;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant implements ProductVariantInterface
{
    use WholesaleRuleQuantityStepTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initWholesaleRuleQuantityStepTrait();
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
