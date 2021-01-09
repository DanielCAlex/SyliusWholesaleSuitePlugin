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

use Sylius\Component\Core\Model\Taxon as BaseTaxon;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Traits\TaxonWholesaleRulesetTrait;

class Taxon extends BaseTaxon
{
    use TaxonWholesaleRulesetTrait;

    public function __construct()
    {
        parent::__construct();
        $this->initWholesaleRulesetTrait();
    }
}