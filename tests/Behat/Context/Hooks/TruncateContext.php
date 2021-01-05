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

use Exception;
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

        foreach ($tablesToTruncate as $key => $entity) {
            $tableName = $this->entityManager
                ->getClassMetadata($entity->getEntityName())
                ->getTableName()
            ;

            //Truncate the entity stored in the current key
            $sql = sprintf('DELETE FROM %s;', $tableName);
            $statement = $connection->prepare($sql);
            $statement->execute();

            //Get the entity repository based off a method from BaseEntity. Polymorphic call (sorry BitBag).
            $entityRepository = $this->entityManager
                ->getRepository($entity->getEntityName());

            //Make sure there are no rows left in the entity table.
            $entities = $entityRepository->findAll();

            if (count($entities) > 0) {
                throw new Exception(
                    'Truncate unsuccessful. There are still rows of this table in the database.'
                );
            }
        }
    }
}
