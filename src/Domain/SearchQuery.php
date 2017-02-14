<?php

namespace Domain;

class SearchQuery
{
    private $term;
    private $limit;

    /**
     * SearchQuery constructor.
     * @param string $term
     * @param int $limit
     */
    public function __construct(string $term, int $limit)
    {
        $this->term = $term;
        $this->limit = $limit;
    }

    /**
     * @return string
     */
    public function term(): string
    {
        return $this->term;
    }

    /**
     * @return int
     */
    public function limit(): int
    {
        return $this->limit;
    }
}