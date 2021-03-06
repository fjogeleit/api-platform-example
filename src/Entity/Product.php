<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Product implements DeletableInterface
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
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var bool
     */
    private $deleted = false;

    /**
     * @var Collection|Warehouse[]
     */
    private $warehouses;

    public function __construct()
    {
        $this->warehouses = new ArrayCollection();
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
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Warehouse[]|Collection
     */
    public function getWarehouses(): Collection
    {
        return $this->warehouses;
    }

    /**
     * @param Warehouse $warehouse
     */
    public function addWarehouse(Warehouse $warehouse): void
    {
        $this->warehouses->add($warehouse);
        $warehouse->addProduct($this);
    }

    /**
     * @param Warehouse $warehouse
     */
    public function removeWarehouse(Warehouse $warehouse): void
    {
        $this->warehouses->removeElement($warehouse);
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
     * @param string   $name
     * @param string   $description
     * @param float    $price
     * @param int      $amount
     * @param Category $category
     * @param array    $warehouses
     * @return Product
     */
    public static function create(
        string $name,
        string $description,
        float $price,
        int $amount,
        Category $category,
        array $warehouses
    ): self
    {
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        $product->setAmount($amount);
        $product->setDescription($description);
        $product->setCategory($category);

        foreach ($warehouses as $warehouse) {
            $product->addWarehouse($warehouse);
        }

        return $product;
    }
}