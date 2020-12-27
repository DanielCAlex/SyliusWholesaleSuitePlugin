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

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\Repository;

use Doctrine\Persistence\ManagerRegistry;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleset;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class WholesaleRulesetRepository extends ServiceEntityRepository implements
    WholesaleRulesetRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WholesaleRuleset::class);
    }

    /**
     * @return WholesaleRuleset[]
     */
    public function findAll(): array
    {
        return $this->findBy(['id' => 'ASC']);
    }
}
