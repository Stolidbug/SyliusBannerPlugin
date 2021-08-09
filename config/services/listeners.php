<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;


use Black\SyliusBannerPlugin\EventListener\SlidesRemoveListener;
use Black\SyliusBannerPlugin\EventListener\SlidesUploadListener;

return function (ContainerConfigurator $configurator) {

    $services = $configurator->services();

    $services
        ->set('black_sylius_banner.listener.slides_uploader', SlidesUploadListener::class)
        ->args([service('black_sylius_banner.slide_uploader')])
        ->tag('kernel.event_listener', ['event' => 'black_sylius_banner.banner.pre_create', 'method' => 'uploadSlides' ])
        ->tag('kernel.event_listener', ['event' => 'black_sylius_banner.banner.pre_update', 'method' => 'uploadSlides' ])
        ->set('black_sylius_banner.listener.slides_remove', SlidesRemoveListener::class)
        ->args([service('black_sylius_banner.slide_uploader')])
        ->args([service('liip_imagine.cache.manager')])
        ->args([service('liip_imagine.filter.manager')])
        ->tag('doctrine.event_listener', ['event' => 'onFlush', 'lazy' => true ])
        ->tag('doctrine.event_listener', ['event' => 'postFlush', 'lazy' => true ]);
};
