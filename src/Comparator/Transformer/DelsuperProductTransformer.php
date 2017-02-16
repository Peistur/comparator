<?php

namespace Comparator\Transformer;

use Domain\Product;
use Domain\ProductCollection;
use Domain\ProductTransformer;

class DelsuperProductTransformer implements ProductTransformer
{
    public function transform($results): ProductCollection
    {
        $products = array_map(function ($categories) {
            return $this->extractProductsFromCategory($categories->productos);
        } ,$results);

        $mergedProductResult = [];

        foreach ($products as $productFromCategory) {
            $mergedProductResult = array_merge($mergedProductResult, $productFromCategory);
        }

        return new ProductCollection(...$mergedProductResult);
    }

    private function extractProductsFromCategory($products)
    {
        $domainProducts = [];

        foreach ($products as $id => $product) {
            $domainProducts[] = new Product(
                $product->name,
                $product->small_image,
                $product->price * 100
            );
        }

        return $domainProducts;
    }
}