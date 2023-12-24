<?php

use Slim\Views\Twig;
/* Dependency injection container configuration */
return [
  'settings' => [
      'twig' => [
          'template_path' => __DIR__ . '/../../app/view',
          'cache_path' => false, // Desativar o cache para desenvolvimento
      ],
  ],
  Twig::class => function ($container) {
    $settings = $container->get('settings')['twig'];
    $twig = Twig::create($settings['template_path'], []);

    return $twig;
  },
];