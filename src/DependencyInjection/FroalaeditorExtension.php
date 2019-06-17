<?php
namespace Mashmars\FroalaeditorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class FroalaeditorExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if(!empty($config['upload_directory']['image_directory'])){
            $container->setParameter('image_directory',$config['upload_directory']['image_directory']); //设置参数 可以在控制器里 通过 $this->geParameter('targetDirectory); 获取
        }
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        //给服务传递参数     
        /* $definition->replaceArgument(0, $config['twitter']['client_id']); */
        $definition = $container->getDefinition('froalaeditor_uploader');
        $definition->setArgument('$imageDirectory',$config['upload_directory']['image_directory']);
        $definition->setArgument('$videoDirectory',$config['upload_directory']['video_directory']);
        $definition->setArgument('$fileDirectory',$config['upload_directory']['file_directory']);
    }
}