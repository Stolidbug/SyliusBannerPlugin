<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Black\SyliusBannerPlugin\Repository\BannerRepository;

return function (ContainerConfigurator $configurator) {

    $services = $configurator->services();

    $services
        ->set('black_sylius_banner.front_repository.banner', BannerRepository::class)
        ->args([service('doctrine')])
        ->args(['%black_sylius_banner.model.banner.class%']);
};
