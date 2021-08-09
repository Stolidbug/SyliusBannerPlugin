<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {

    $container->extension('doctrine-mapping', [
        'mapped-superclass' => [
            'name' => "Black\SyliusBannerPlugin\Entity\Banner",
            'table' => "black_banner_banner",
            'id' => [
                'name' => "id",
                'column' => "id",
                'type' => "integer",
            ],
            'many-to-many' =>  [
                'field' => "channels",
                'target-entity' => "Sylius\Component\Channel\Model\ChannelInterface",
                [
                    'join-table' => [
                        'name' => "black_banner_channels",
                        [
                            'join-columns' => [
                                'join-column' => [
                                    'name' => "banner_id",
                                    'referenced-column-name' => "id",
                                    'nullable' => false,
                                    'on-delete' => "CASCADE",
                                ],
                            ],
                            'inverse-join-columns' => [
                                'join-column' => [
                                    'name' => "channel_id",
                                    'referenced-column-name' => "id",
                                    'nullable' => false,
                                    'on-delete' => "CASCADE",
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'one-to-many' => [
                'field' => "slides",
                'target-entity' => "Black\SyliusBannerPlugin\Entity\Slide",
                'mapped-by' => "banner",
                'orphan-removal' => "true",
                [
                    'cascade' => [
                        'cascade-all /' => [

                        ],
                    ],
                ],
            ],
        ],
    ]);
};
