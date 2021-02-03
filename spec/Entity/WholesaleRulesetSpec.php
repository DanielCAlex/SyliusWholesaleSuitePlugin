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
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\BaseEntity;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleQuantityStepInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

final class WholesaleRulesetSpec extends ObjectBehavior
{
    public function it_is_a_resource(): void
    {
        $this->shouldHaveType(ResourceInterface::class);
    }

    public function it_extends_base_entity()
    {
        $this->shouldBeAnInstanceOf(BaseEntity::class);
    }

    public function it_toggles(): void
    {
        $this->setEnabled(true);
        $this->enabled()->shouldReturn(true);

        $this->setEnabled(false);
        $this->enabled()->shouldReturn(false);
    }

    public function it_associates_rules(WholesaleRuleQuantityStepInterface $firstRule, WholesaleRuleQuantityStepInterface $secondRule
    ): void {
        $this->addRule($firstRule);
        $this->hasRule($firstRule)->shouldReturn(true);

        $this->addRule($secondRule);
        $this->hasRule($secondRule)->shouldReturn(true);
    }

    public function it_removes_rules(WholesaleRuleQuantityStepInterface $firstRule): void
    {
        $this->addRule($firstRule);
        $this->hasRule($firstRule)->shouldReturn(true);

        $this->removeRule($firstRule);
        $this->hasRule($firstRule)->shouldReturn(false);
    }
}