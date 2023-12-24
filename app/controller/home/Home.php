<?php
namespace FlexCore\controller\home;
use FlexCore\core\controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
class Home extends Controller
{           
    /**
     * __construct
     *
     * @param Twig $twig
     * @return void
     */
    public function __construct(protected Twig $twig){

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