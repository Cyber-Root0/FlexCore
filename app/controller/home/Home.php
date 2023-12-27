<?php
namespace FlexCore\controller\home;
use FlexCore\handle\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use FlexCore\handle\Logger;
class Home extends Controller
{           
    /**
     * __construct
     *
     * @param Twig $twig
     * @return void
     */
    public function __construct(protected Twig $twig, protected Logger $logger){

    }
    /**
     * Default index renderization
     *
     * @param  ServerRequestInterface $request
     * @param  ResponseInterface $response
     * @return ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface{
        
        $this->render($response,'home', []);
        return $response;
    }

}