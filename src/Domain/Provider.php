<?php

namespace Domain;

interface Provider
{
    public function provide(SearchQuery $searchQuery): ProviderQueryResult;
}