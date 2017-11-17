<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\User\Role;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var ArrayCollection|Role[]
     */
    protected $roles;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var bool
     */
    protected $active = true;

    /**
     * @var \DateTime
     */
    protected $created;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
        $this->created = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles->map(function(Role $role) {
            return $role->getName();
        })->toArray();
    }

    /**
     * @param Role $role
     */
    public function addRole(Role $role): void
    {
        $this->roles->add($role);
    }

    /**
     * @param Role $role
     */
    public function removeRole(Role $role): void
    {
        $this->roles->removeElement($role);
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return void
     */
    public function getSalt(): void
    {
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return (string) $this->getEmail();
    }

    /**
     * @return bool
     */
    public function eraseCredentials(): bool
    {
        return true;
    }

    public function activate(): void
    {
        $this->active = true;
    }

    public function deactivate(): void
    {
        $this->active = false;
    }

    /**
     * @param string $email
     * @param Role   $role
     *
     * @return User
     */
    public static function create(string $email, string $password, Role $role): self
    {
        $user = new self();
        $user->setEmail($email);
        $user->setPassword($password);
        $user->addRole($role);

        return $user;
    }
}
