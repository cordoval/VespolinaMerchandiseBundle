<?php

namespace Vespolina\MerchandiseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

class VespolinaMerchandiseExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        foreach (array('service') as $basename) {
            $loader->load(sprintf('%s.xml', $basename));
        }

    }

    public function getNamespace()
    {
        return 'http://www.symfony-project.org/schema/dic/vespolinamerchandise';
    }
}