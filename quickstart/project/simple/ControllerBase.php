<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets->addCss("//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css", false);
        $this->assets->addCss("css/blog.css");
        $this->assets->addJs("//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js", false);
        $this->assets->addJs("//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", false);
        $this->view->setTemplateAfter('base');
    }
}
