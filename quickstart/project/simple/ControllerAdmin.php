<?php

use Phalcon\Mvc\Controller;

class ControllerAdmin extends Controller
{
    public function initialize()
    {
        if(!$this->session->auth){
          // comment this line to disable an ultra basic access control system
          $this->response->redirect('');
        }
        $this->assets->addCss("//fonts.googleapis.com/css?family=Roboto:400,500,700,900&amp;subset=latin,cyrillic-ext,cyrillic", false);
        $this->assets->addCss("//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css", false);
        $this->assets->addCss("//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css", false);
        $this->assets->addCss('css/webtools.css');
        $this->assets->addCss("//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css",false);
        $this->assets->addCss('//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css');
        $this->assets->addJs('js/webtools.js');
        $this->assets->addJs('//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js',false);
        $this->assets->addJs("//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js",false);
        $this->assets->addJs('js/custom.js');
        $controllersDir = $this->config->application->controllersDir;
        $controllers = [];
        foreach (new DirectoryIterator($controllersDir) as $fileInfo) {
              if($fileInfo->isDot()) continue;
              if(in_array($fileInfo->getFilename(), ['ControllerBase.php','ControllerAdmin.php'])) continue;
              $controller = substr_replace($fileInfo->getFilename(),'',-14);
              $controllers[] = [$controller,$this->from_camel_case($controller)];
        }
        $this->view->setTemplateAfter('admin');
        $this->view->controllers = $controllers;
    }

    public function from_camel_case($input) {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}
