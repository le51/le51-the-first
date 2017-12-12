<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function aboutAction()
    {

    }

    public function authAction()
    {
        if($this->request->isPost()){
            if($this->request->getPost('password') == $this->config->application->password){
                $this->session->auth = true;
                //$this->view->pick('dashboard/index');
                $this->dispatcher->forward([
                    'controller' => 'dashboard',
                    'action' => 'index'
                ]);
                $this->flash->success('You have been successfuly logged in');
            } else {
                $this->session->auth = false;
                $this->dispatcher->forward([
                    'controller' => 'index',
                    'action' => 'index'
                ]);
                $this->flash->error('Wrong password');
            }
        }
        else {
            $this->session->auth = false;
            $this->dispatcher->forward([
                    'controller' => 'index',
                    'action' => 'index'
                ]);
            $this->flash->notice('Good bye');
        }
    }
}
