<?php
declare(strict_types=1);

namespace App\Action\Product;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SoftDeleteAction
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route(
     *     name="app_product_delete",
     *     path="products/{id}/delete",
     *     defaults={"_api_resource_class"="App\Entity\Product", "_api_item_operation_name"="delete"}
     * )
     *
     * @Method("DELETE")
     *
     * @param Product $product
     *
     * @return Response
     */
    public function __invoke(Product $product): Response
    {
        $product->delete();
        $this->entityManager->flush();

        return new Response('', 204);
    }
}
