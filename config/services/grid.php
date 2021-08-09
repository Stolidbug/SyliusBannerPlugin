<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Black\SyliusBannerPlugin\UI\Grid\Filter\ChannelFilter;

return function (ContainerConfigurator $configurator) {

    $services = $configurator->services();

    $services
        ->set('black_sylius_banner.grid.filter.channel', ChannelFilter::class)
        ->tag('sylius.grid_filter', ['type' => "banner_channel",
            'form_type' => "Black\SyliusBannerPlugin\UI\Form\Type\ChannelFilterType"]);
};
