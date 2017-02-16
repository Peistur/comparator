<?php

namespace Comparator\Provider;

use Domain\ProductTransformer;
use Domain\Provider;
use Domain\ProviderQueryResult;
use Domain\Searcher;
use Domain\SearchQuery;

class DelsuperProvider implements Provider
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
        $products = $this->transformer->transform($productResult);

        return new ProviderQueryResult(
            $this->providerName,
            $products
        );
    }
}