<?php

namespace App\Service\Storage;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class UserStorage
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return User|null
     */
    public function getCurrent()
    {
        if (false === $this->tokenStorage->getToken() instanceof TokenInterface) {
            return null;
        }

        return $this->tokenStorage->getToken()->getUser();
    }
}
