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

class BaseEntity
{
    public function getEntityName(): string
    {
        return static::class;
    }

    //TODO Look into doctrine documentation for a more "correct" approach to shared methods amongst entities.
}
