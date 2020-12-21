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

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Context\Hooks;

use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityManagerInterface;

final class TruncateContext implements Context
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function truncateTables(array $tablesToTruncate)
    {
        $connection = $this->entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();

        foreach ($tablesToTruncate as $table) {
            $connection->executeStatement(
                $platform->getTruncateTableSQL(
                    $table,
                    false
                )
            );
        }
    }
}
