<?php

namespace Domain;

class ProviderQueryResult implements \IteratorAggregate
{
    private $products;
    private $provider;

    /**
     * ProviderQueryResult constructor.
     * @param $products
     * @param $provider
     */
    public function __construct(string $provider, Product ...$products)
    {
        $this->provider = $provider;
        $this->products = $products;
    }

    public function getIterator()
    {
        yield from $this->products;
    }
}