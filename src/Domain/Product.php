<?php

namespace Domain;

class Product
{
    private $name;
    private $imageUrl;
    private $price;

    /**
     * Product constructor.
     *
     * @param string $name
     * @param string $imageUrl
     * @param int $price
     */
    public function __construct(string $name, string $imageUrl, int $price)
    {
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function imageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return int
     */
    public function price(): int
    {
        return $this->price;
    }
}