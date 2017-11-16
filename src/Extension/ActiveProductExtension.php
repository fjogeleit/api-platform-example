<?php
declare(strict_types=1);

namespace App\Extension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Product;
use Doctrine\ORM\QueryBuilder;

class ActiveProductExtension implements QueryCollectionExtensionInterface
{
    /**
     * filter all disabled products by default
     *
     * {@inheritdoc}
     */
    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        if (Product::class === $resourceClass) {
            $queryBuilder
                ->andWhere(sprintf('%s.disabled = :disabled', $queryBuilder->getRootAliases()[0]))
                ->setParameter('disabled', false);
        }
    }
}