<?php

namespace App\DependencyInjection\Compiler;

use App\Social\SocialNetworkInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ShareContentPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(SocialNetworkInterface::class);

        if(!$container->get(SocialNetworkInterface::class)) {
            return;
        }

        $definition = $container->findDefinition(SocialNetworkInterface::class);

        $taggedServices = $container->findTaggedServiceIds('social_network');

        foreach ($taggedServices as $socialNetwork => $id) {
            $definition->addMethodCall('addSocialNetworkSenders', [new Reference($socialNetwork)]);
        }
    }
}