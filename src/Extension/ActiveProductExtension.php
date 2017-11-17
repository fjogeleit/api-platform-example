<?php
declare(strict_types=1);

namespace App\Extension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Product;
use Doctrine\ORM\QueryBuilder;

class ActiveProductExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    /**
     * filter all soft deleted products by default
     *
     * {@inheritdoc}
     */
    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    /**
     * filter product if deleted is true
     *
     * {@inheritdoc}
     */
    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = [])
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    private function addWhere(QueryBuilder $queryBuilder, string $resourceClass)
    {
        if (Product::class === $resourceClass) {
            $queryBuilder
                ->andWhere(sprintf('%s.deleted = :deleted', $queryBuilder->getRootAliases()[0]))
                ->setParameter('deleted', false);
        }
    }
}