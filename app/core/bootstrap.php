<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use FlexCore\middleware\firewall\HandleFirewall;
use Shieldon\Firewall\Panel;
use DI\ContainerBuilder;
use Slim\Views\Twig;
/**
 * Instantiate App
 *
 * In order for the factory to work you need to ensure you have installed
 * a supported PSR-7 implementation of your choice e.g.: Slim PSR-7 and a supported
 * ServerRequest creator (included with Slim PSR-7)
 */
 // Configuração do container
$containerBuilder = new ContainerBuilder();

$containerDefinitions = require_once __DIR__ ."/../../config/di/container.php";
$containerBuilder->addDefinitions($containerDefinitions);

// Cria o container
$container = $containerBuilder->build();
$app = \DI\Bridge\Slim\Bridge::create($container);

/**
  * The routing middleware should be added earlier than the ErrorMiddleware
  * Otherwise exceptions thrown from it will not be handled by the middleware
  */

$app->addRoutingMiddleware();

/**
 * Add Error Middleware
 *
 * @param bool                  $displayErrorDetails -> Should be set to false in production
 * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool                  $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger  
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

/* Application Firewall */
if ( FIREWALL_STATUS ){
  $app->map(['GET', 'POST'], '/firewall/panel[/{params:.*}]', function (Request $request, Response $response, Panel $panel) {
    $panel->entry();
  });
  $app->add(new HandleFirewall);
}

require_once(__DIR__.'/../../config/router/router.php');

$app->run();