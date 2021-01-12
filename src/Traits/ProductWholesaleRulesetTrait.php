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

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Traits;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleset;

trait ProductWholesaleRulesetTrait
{
    /**
     * @var ArrayCollection<WholesaleRuleset>
     */
    protected $skyBoundTechWholesaleRulesets;

    public function initWholesaleRulesetTrait()
    {
        $this->skyBoundTechWholesaleRulesets = new ArrayCollection();
    }

    /**
     * @param WholesaleRuleset $wholesaleRuleset
     */
    public function addSkyBoundTechWholesaleRuleset(WholesaleRuleset $wholesaleRuleset): void
    {
        if ($this->skyBoundTechWholesaleRulesets->contains($wholesaleRuleset)) {
            return;
        }

        $this->skyBoundTechWholesaleRulesets->add($wholesaleRuleset);
        $wholesaleRuleset->addRulesetProduct($this);
    }

    public function removeSkyBoundTechWholesaleRuleset(WholesaleRuleset $wholesaleRuleset)
    {
        if (!$this->skyBoundTechWholesaleRulesets->contains($wholesaleRuleset)) {
            return;
        }
        $this->skyBoundTechWholesaleRulesets->removeElement($wholesaleRuleset);
        $wholesaleRuleset->removeRulesetProduct($this);
    }

    public function getSkyBoundTechWholesaleRulesets(): ?Collection
    {
        return $this->skyBoundTechWholesaleRulesets;
    }
}
