<?php

namespace FlexCore\core\controller;
class Controller
{
    public function render($response,string $view, array $data = []){

        $this->twig->render($response,$view.'.twig.php', $data);

    }

}