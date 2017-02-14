<?php

namespace Comparator\Command;

use Domain\SearchQuery;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompareFoodCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('comparator:food:compare')
            ->setDescription('Compares food between groceries')
            ->addArgument('term', InputArgument::REQUIRED, 'The name of the product to compare')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $term = $input->getArgument('term');

        $searchQuery = new SearchQuery((string)$term, 5);

        $compreaProvider = $this->getContainer()->get('comparator.provider.comprea');

        $result = $compreaProvider->provide($searchQuery);

        foreach($result as $product) {
            dump($product);
        }
    }
}