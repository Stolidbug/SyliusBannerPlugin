<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {

    $container->parameters()
        ->set('black_banner.uploader.filesystem', "black_sylius_banner");

    $container->extension('doctrine', [
        'orm' => [
            'auto_generate_proxy_classes' => '%kernel.debug%',
            'entity_managers' => [
                'default' => [
                    'auto_mapping' => true,
                ],
            ],
        ],
    ]);

    $container->extension('knp_gaufrette', [
        'adapters' => [
            'black_sylius_banner' => [
                'safe_local' => [
                    'directory' => "%sylius_core.public_dir%/media/banner/",
                    'create' => true,
                ],
            ],
        ],
        'filesystems' => [
            'black_sylius_banner' => [
                'adapter' => "%black_banner.uploader.filesystem%",
            ],
        ],
        'stream_wrapper' => null,
    ]);

    $container->extension('liip_imagine', [
        'loaders' => [
                'black_sylius_banner' => [
                    'stream' => [
                        'wrapper' => "gaufrette://black_sylius_banner/"
                    ],
                ],
        ],
        'filter_sets' => [
            'black_sylius_banner' => [
                'data_loader' => "black_sylius_banner",
                'filters' => [
                    'upscale' => [`min: [1200, 400]`],
                    'thumbnail' => [`size: [1200, 400], mode: inbound`],
                ],
            ],
        ],
    ]);

    $container->extension('sylius_grid', [
        'templates' => [
            'filter' => [
                'banner_channel' => "@BlackSyliusBannerPlugin/Admin/Grid/Filter/channel.html.twig",
            ],
        ],
        'grids' => [
            'black_sylius_banner' => [
                'driver' => [
                    'name' => "doctrine/orm",
                    'options' => [
                        'class' => 'expr:parameter("black_sylius_banner.model.banner.class")',
                    ],
                ],
                'fields' => [
                    'code' => [
                        'type' => 'string',
                        'label' => 'sylius.ui.code',
                    ],
                    'name' => [
                        'type' => 'string',
                        'label' => 'sylius.ui.code',
                    ],
                ],
                'filters' => [
                    'code' => [
                        'type' => 'string',
                        'label' => 'sylius.ui.code',
                    ],
                    'name' => [
                        'type' => 'string',
                        'label' => 'sylius.ui.code',
                    ],
                    'channel' => [
                        'type' => 'string',
                        'label' => 'sylius.ui.channel',
                    ],
                ],
                'actions' => [
                    'main' => [
                        'create' => [
                            'type' => 'create',
                        ],
                    ],
                    'item' => [
                        'update' => [
                            'type' => 'create',
                        ],
                        'delete' => [
                            'type' => 'delete',
                        ],
                    ],
                ],
            ],
        ],
    ]);
};
