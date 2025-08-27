<?php

defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\MVCComponent;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class implements ServiceProviderInterface {
    
    public function register(Container $container): void {


        $container->registerServiceProvider(new MVCFactory('\\Thusia\\Component\\AwinSignupForm'));
        $container->registerServiceProvider(new ComponentDispatcherFactory('\\Thusia\\Component\\AwinSignupForm'));

        //This is Joomla’s way of saying:
        // “Here’s how to create the core component logic when someone accesses com_awinsignupform.”
        $container->set(
            ComponentInterface::class,
            function (Container $container) {
                $component = new MVCComponent($container->get(ComponentDispatcherFactoryInterface::class));
                $component->setMVCFactory($container->get(MVCFactoryInterface::class));

                return $component;
            }
        );
        
        $container->set(
            AwinController::class,
            function (Container $container) {
                return new AwinController([
                    'name' => 'awin',
                    'option' => 'com_awinsignupform',
                ]);
            }
        );

        $container->set(
            HtmlView::class,
            function (Container $container) {
                return new HtmlView([
                    'name' => 'awin',
                    'option' => 'com_awinsignupform',
                ]);
            }
        );
    }
};