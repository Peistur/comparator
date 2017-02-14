<?php

namespace Comparator\Provider;

use Domain\ProductTransformer;
use Domain\Provider;
use Domain\ProviderQueryResult;
use Domain\Searcher;
use Domain\SearchQuery;

class CompreaProvider implements Provider
{
    private $providerName;
    private $searcher;
    private $transformer;

    /**
     * CompreaProvider constructor.
     * @param string $providerName
     * @param Searcher $searcher
     * @param ProductTransformer $transformer
     */
    public function __construct(
        string $providerName,
        Searcher $searcher,
        ProductTransformer $transformer
    ) {
        $this->providerName = $providerName;
        $this->searcher = $searcher;
        $this->transformer = $transformer;
    }

    public function provide(SearchQuery $searchQuery): ProviderQueryResult
    {
        $productResult = $this->searcher->search($searchQuery->term());
        $transformer = $this->transformer;

        $products = array_map(function ($product) use ($transformer) {
            return $transformer->transform($product);
        } ,$productResult);

        $products = $this->applyLimit($products, $searchQuery->limit());

        return new ProviderQueryResult(
            $this->providerName,
            ...$products
        );
    }

    private function applyLimit(array $productResult, int $limit): array
    {
        return array_slice($productResult, 0, $limit);
    }
}