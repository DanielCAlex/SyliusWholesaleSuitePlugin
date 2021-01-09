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

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Services;

use Doctrine\ORM\EntityManagerInterface;

final class EntityHelper implements EntityHelperInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $entityName
     *
     * @return array|null
     */
    public function entityHasRecords(string $entityName): ?array
    {
        $repository = $this->entityManager->getRepository($entityName);
        return $repository->findAll();
    }
}
