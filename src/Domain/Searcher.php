<?php

namespace Domain;

interface Searcher
{
    public function search(string $term): array;
}