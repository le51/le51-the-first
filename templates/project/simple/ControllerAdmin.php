<?php

use Phalcon\Mvc\Controller;

class ControllerAdmin extends Controller
{
  public function initialize()
  {
      if(!$this->session->auth){
          $this->flash->error("You have to login first");
          $this->response->redirect('');
      }
      $controllersDir = $this->config->application->controllersDir;
      $controllers = [];
      foreach (new DirectoryIterator($controllersDir) as $fileInfo) {
          if($fileInfo->isDot()) continue;
          if(in_array($fileInfo->getFilename(), ['ControllerBase.php','ControllerAdmin.php','IndexController.php'])) continue;
          $controllers[] = strtolower(substr_replace($fileInfo->getFilename(),'',-14));
      }
      $this->view->setTemplateAfter('admin');
      $this->view->controllers = $controllers;
  }
}
