<?php

namespace App\Classes;

class Product
{
    protected ?int $id = null;

    protected ?string $name = null;

    protected ?float $price = null;

    protected ?string $category = null;

    /**
     * @throws ProductException
     */
    public function __construct(array $properties)
    {
        foreach ($properties as $property => $value) {
            $this->{$property} = $value;
        }

        $this->validate();
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
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    protected function validate()
    {
        foreach ($this as $property => $value) {
            if ($value == null) {
                throw new ProductException($property. " can not be empty");
            }
        }
    }
}