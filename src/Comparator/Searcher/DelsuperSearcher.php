<?php

namespace Comparator\Searcher;

use Domain\Searcher;

class DelsuperSearcher implements Searcher
{
    private $url;

    /**
     * CompreaSearcher constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function search(string $term): array
    {
        $products = [];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url . $term);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $products = json_decode($response);

        return $products;
    }
}