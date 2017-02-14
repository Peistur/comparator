<?php

namespace Comparator;

use Comparator\DependencyInjection\ComparatorExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ComparatorBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new ComparatorExtension();
    }
}