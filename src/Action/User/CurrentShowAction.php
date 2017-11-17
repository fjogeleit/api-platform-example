<?php
declare(strict_types=1);

namespace App\Action\User;

use App\Service\Storage\UserStorage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

class CurrentShowAction
{
    /**
     * @var UserStorage
     */
    private $userStorage;

    /**
     * @param UserStorage $userStorage
     */
    public function __construct(UserStorage $userStorage)
    {
        $this->userStorage = $userStorage;
    }

    /**
     * @Route(
     *     name="users_current",
     *     path="users/current",
     *     defaults={"_api_resource_class"="App\Entity\User", "_api_collection_operation_name"="current"}
     * )
     *
     * @Method("GET")
     *
     * @return array
     */
    public function __invoke(): array
    {
        $user = $this->userStorage->getCurrent();

        return [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'roles' => $user->getRoles()
        ];
    }
}
