<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Black\SyliusBannerPlugin\UI\Action\ShowBannerAction;
use Black\SyliusBannerPlugin\UI\Menu\AdminMenuListener;

return function (ContainerConfigurator $configurator) {

    $services = $configurator->services();

    $services
        ->set('black_sylius_banner.ui.menu.admin_menu_listener', AdminMenuListener::class)
        ->tag('kernel.event_listener', ['event' => 'sylius.menu.admin.main','methode' => 'sylius.menu.admin.main'])
        ->set('black_sylius_banner.ui.action.show_banner', ShowBannerAction::class)
        ->args([service('black_sylius_banner.front_repository.banner')])
        ->args([service('sylius.context.channel')])
        ->args([service('twig')])
        ->tag('controller.service_arguments');
};
