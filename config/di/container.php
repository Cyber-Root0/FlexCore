<?php

use Slim\Views\Twig;
use FlexCore\handle\Logger;
/* Dependency injection container configuration */
return [
  'settings' => [
      'twig' => [
          'template_path' => __DIR__ . '/../../app/view',
          'cache_path' => true, // Desativar o cache para desenvolvimento
      ],
      'Logger' => [
        'path'=> APP_LOG_PATH,
      ]
  ],
  Twig::class => function ($container) {
    $settings = $container->get('settings')['twig'];
    $twig = Twig::create($settings['template_path'], []);

    return $twig;
  },
  Logger::class => function ($container) {
    $settings = $container->get('settings')['Logger'];
    return new Logger($settings['path']);
  }
];