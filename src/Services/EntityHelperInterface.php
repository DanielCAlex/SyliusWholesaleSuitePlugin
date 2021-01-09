<?php

declare(strict_types=1);

/*
 * This file was created by a developer at SkyBound Tech.
 * @author Daniel Alexandre <daniel.alexandre@skyboundtech.co>
 *
 * (c) SkyBound Tech
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Services;

interface EntityHelperInterface
{
    /**
     * @param string $entityName
     *
     * @return array|null
     */
    public function entityHasRecords(string $entityName): ?array;
}
