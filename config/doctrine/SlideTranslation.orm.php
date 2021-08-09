<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {

    $container->extension('doctrine-mapping', [
        'mapped-superclass' => [
            'name' => "Black\SyliusBannerPlugin\Entity\SlideTranslation",
            'table' => "black_banner_slide_translation",
            'id' => [
                'name' => "id",
                'column' => "id",
                'type' => "integer",
            ],
            'field' => [
                'name' => "content",
                'type' => "id",
                'nullable' => true,
            ],
        ],
    ]);
};
