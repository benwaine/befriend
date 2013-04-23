<?php

namespace BefriendExtension;

use Behat\Behat\Extension\Extension as BehatBehatExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Extension extends BehatBehatExtension {

    public function load(array $config, ContainerBuilder $container) {

        $loader = new XmlFileLoader(
                        $container,
                        new FileLocator(__DIR__)
        );
        
        $loader->load('services.xml');
    }
    
        /**
     * Setups configuration for current extension.
     *
     * @param ArrayNodeDefinition $builder
     */
    public function getConfig(ArrayNodeDefinition $builder)
    {
        $builder->
            children()->
                scalarNode('facebook_appid')->
                    isRequired()->
                end()->
                scalarNode('facebook_appsecret')->
                    isRequired()->  
                end();
    }
    
}
