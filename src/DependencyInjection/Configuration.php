<?php
namespace Mashmars\FroalaeditorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = $treeBuilder = new TreeBuilder('froalaeditor');

        $treeBuilder->getRootNode()
            ->children()
                    ->arrayNode('upload_directory')
                        ->children()
                            ->scalarNode('image_directory')->end()
                            ->scalarNode('file_directory')->end()
                            ->scalarNode('video_directory')->end()
                        ->end()
                    ->end()
                ->end();
               /*  ->children()
                    ->scalarNode('image_directory')
                        ->defaultValue('./upload/images')
                    ->end()
                ->end(); */
                        
        return $treeBuilder;
    }
}