<?php

declare(strict_types=1);

namespace SkyBoundTech\SyliusWholesaleSuitePlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sky_bound_tech_sylius_wholesale_suite_plugin');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
