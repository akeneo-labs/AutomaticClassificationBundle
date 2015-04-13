<?php

/*
 * To be defined.
 */

namespace PimEnterprise\Bundle\AutomaticClassificationBundle\DependencyInjection;

use Akeneo\Bundle\StorageUtilsBundle\DependencyInjection\AkeneoStorageUtilsExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Pim enterprise automatic classification extension
 *
 * @author    Damien Carcel (https://github.com/damien-carcel)
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 */
class PimEnterpriseAutomaticClassificationExtension extends AkeneoStorageUtilsExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('engine.yml');
        $loader->load('models.yml');
        $loader->load('serializers.yml');
    }
}
