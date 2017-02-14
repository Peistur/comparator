<?php

namespace Comparator\Transformer;

use Domain\Product;
use Domain\ProductTransformer;

class CompreaProductTransformer implements ProductTransformer
{
    public function transform($resultProduct): Product
    {
        return new Product(
            $resultProduct->name,
            $resultProduct->picture,
            $resultProduct->price * 100
        );
    }
}