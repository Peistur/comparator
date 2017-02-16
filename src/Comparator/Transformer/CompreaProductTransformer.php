<?php

namespace Comparator\Transformer;

use Domain\Product;
use Domain\ProductCollection;
use Domain\ProductTransformer;

class CompreaProductTransformer implements ProductTransformer
{
    public function transform($results): ProductCollection
    {
        $products = array_map(function ($product) {
            return new Product(
                $product->name,
                $product->picture,
                $product->price * 100
            );
        } ,$results);

        return new ProductCollection(...$products);
    }
}