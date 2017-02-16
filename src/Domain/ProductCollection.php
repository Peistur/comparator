<?php

namespace Domain;

class ProductCollection implements \IteratorAggregate
{
    private $products;

    /**
     * ProductCollection constructor.
     * @param Product[] ...$products
     */
    public function __construct(Product ...$products)
    {
        $this->products = $products;
    }

    public function getIterator()
    {
        yield from $this->products;
    }
}