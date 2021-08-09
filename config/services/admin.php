<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Black\SyliusBannerPlugin\UI\Grid\Filter\ChannelFilter;
use Black\SyliusBannerPlugin\UI\Menu\AdminMenuListener;

return function (ContainerConfigurator $configurator) {

    $services = $configurator->services();

    $services
        ->set('black_sylius_banner.ui.menu.admin_menu_listener', AdminMenuListener::class)
        ->tag('kernel.event_listener', ['event' => "sylius.menu.admin.main",'methode' => "addAdminMenuItems"])
        ->set('black_sylius_banner.grid.filter.channel', ChannelFilter::class)
        ->tag('sylius.grid_filter', ['type' => "banner_channel",'form_type' => "Black\SyliusBannerPlugin\UI\Form\Type\ChannelFilterType"]);
};
