<?php

namespace Domain;

interface ProductTransformer
{
    public function transform($product): ProductCollection;
}