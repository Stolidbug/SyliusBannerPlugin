<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Black\SyliusBannerPlugin\UI\Form\Type\BannerType;
use Black\SyliusBannerPlugin\UI\Form\Type\ChannelFilterType;
use Black\SyliusBannerPlugin\UI\Form\Type\SlideTranslationType;

return function (ContainerConfigurator $configurator) {

    $services = $configurator->services();

    $services
        ->set('black_sylius_banner.form.type.banner', BannerType::class)
        ->args(['%black_sylius_banner.model.slide.class%'])
        ->tag('form.type')
        ->set('black_sylius_banner.form.type.slide_translation', SlideTranslationType::class)
        ->args(['%black_sylius_banner.model.slide_translation.class%'])
        ->tag('form.type')
        ->set('black_sylius_banner.form.type.channel_filter', ChannelFilterType::class)
        ->args([service('sylius.repository.channel')])
        ->tag('form.type');
};
