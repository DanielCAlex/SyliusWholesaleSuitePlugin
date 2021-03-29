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

namespace spec\SkyBoundTech\SyliusWholesaleSuitePlugin\Entity;

use PhpSpec\ObjectBehavior;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\QuantityStepRuleInterface;
use Sylius\Component\Core\Model\Taxon;

class TaxonSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(Taxon::class);
    }
}
