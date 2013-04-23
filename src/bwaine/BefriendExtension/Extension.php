<?php

namespace BefriendExtension;

use Behat\Behat\Extension\Extension as BehatBehatExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class Extension extends BehatBehatExtension {

    public function load(array $config, ContainerBuilder $container) {

        $loader = new XmlFileLoader(
                        $container,
                        new FileLocator(__DIR__)
        );
        
        $loader->load('services.xml');
    }

}
