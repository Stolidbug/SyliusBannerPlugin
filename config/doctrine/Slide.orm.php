<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {

    $container->extension('doctrine-mapping', [
        'mapped-superclass' => [
            'name' => "Black\SyliusBannerPlugin\Entity\Slide",
            'table' => "black_banner_slide",
            'id' => [
                'name' => "id",
                'column' => "id",
                'type' => "integer",
            ],
            'field' => [
                 'name' => "path"
            ],
            'one-to-many' => [
                'field' => "banner",
                'target-entity' => "Black\SyliusBannerPlugin\Entity\Banner",
                'inversed-by' => "slides",
                [
                    'join-column' => [
                        'name' => "banner_id",
                        'referenced-column-name' => "id"
                    ],
                ],
            ],
        ],
    ]);
};
