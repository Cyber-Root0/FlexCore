<?php

namespace FlexCore\handle;
class Controller
{    
    /**
     * Render template
     *
     * @param $response
     * @param string $view
     * @param array $data
     * @return void
     */
    public function render($response,string $view, array $data = []){

        $this->twig->render($response,$view.'.twig.php', $data);

    }

}