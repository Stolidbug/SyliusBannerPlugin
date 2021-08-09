<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;


use Black\SyliusBannerPlugin\Generator\UploadedSlidePathGenerator;
use Black\SyliusBannerPlugin\Uploader\SlideUploader;
use Black\SyliusBannerPlugin\Uploader\SlideUploaderInterface;

return function (ContainerConfigurator $configurator) {
    $configurator->import('services/*');

    $services = $configurator->services();

    $services
        ->set(SlideUploader::class)
        ->args([service('black_sylius.banner.gaufrette.filesystem')])
        ->args([service('Black\SyliusBannerPlugin\Generator\SlidePathGeneratorInterface')]);

    $services
        ->set(SlideUploaderInterface::class)
        ->alias('black_sylius_banner.slide_uploader',SlideUploaderInterface::class);

    $services
        ->set(UploadedSlidePathGenerator::class);
};
