<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Warehouse
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Collection|Product[]
     */
    private $products;

    /**
     * @var bool
     */
    private $deleted = false;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void
    {
        $this->products->add($product);
    }

    /**
     * @param Product $product
     */
    public function removeProduct(Product $product): void
    {
        $this->products->removeElement($product);
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function delete(): void
    {
        $this->deleted = true;
    }

    /**
     * @param string $name
     *
     * @return Warehouse
     */
    public static function create(string $name): self
    {
        $warehouse = new self();
        $warehouse->setName($name);

        return $warehouse;
    }
}