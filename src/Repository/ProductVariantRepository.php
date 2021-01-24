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

use Doctrine\ORM\Mapping;
use Doctrine\ORM\EntityManager;
use SyliusLabs\AssociationHydrator\AssociationHydrator;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository as BaseProductVariantRepository;

final class ProductVariantRepository extends BaseProductVariantRepository
    implements ProductVariantRepositoryInterface
{
    /** @var AssociationHydrator */
    protected $associationHydrator;

    public function __construct(EntityManager $entityManager, Mapping\ClassMetadata $class)
    {
        parent::__construct($entityManager, $class);
        $this->associationHydrator = new AssociationHydrator($entityManager, $class);
    }

    public function findByProductNamePart(string $phrase, string $locale, ?int $limit = null): array
    {
        $productVariants = $this->createQueryBuilder('product_variant')
            ->innerJoin('product_variant.product', 'product',)
            ->innerJoin(
                'product.translations',
                'product_translation',
                'WITH',
                'product_translation.locale = :locale'
            )
            ->andWhere('product_translation.name LIKE :name')
            ->setParameter('name', '%' . $phrase . '%')
            ->setParameter('locale', $locale)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;

        return $productVariants;
    }
}
