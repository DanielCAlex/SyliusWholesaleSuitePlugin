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
use Sylius\Component\Core\Model\Product;
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
            ->innerJoin(
                'product_variant.translations',
                'product_variant_translation',
            )
            ->innerJoin(
                'Sylius\Component\Core\Model\Product',
                'product',
                'WITH',
                'product = product_variant.product'
            )
            ->andWhere('product.code LIKE :name')
            ->andWhere('product_variant_translation.locale = :locale')
            ->setParameter('name', '%' . $phrase . '%')
            ->setParameter('locale', $locale)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;

        return $productVariants;
    }
}
