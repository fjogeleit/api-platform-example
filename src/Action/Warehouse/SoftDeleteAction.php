<?php
declare(strict_types=1);

namespace App\Action\Warehouse;

use App\Entity\Warehouse;
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
     *     name="app_warehouse_delete",
     *     path="warehouses/{id}/delete",
     *     defaults={"_api_resource_class"="App\Entity\Warehouse", "_api_item_operation_name"="delete"}
     * )
     *
     * @Method("DELETE")
     *
     * @param Warehouse $warehouse
     *
     * @return Response
     */
    public function __invoke(Warehouse $warehouse): Response
    {
        $warehouse->delete();
        $this->entityManager->flush();

        return new Response('', 204);
    }
}
