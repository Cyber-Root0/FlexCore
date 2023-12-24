<?php
namespace FlexCore\controller\home;
use FlexCore\core\controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class Home extends Controller
{       
    public function __construct(protected Twig $twig){

    }

    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface{
        
        $this->render($response,'home', []);
        return $response;
    }

}