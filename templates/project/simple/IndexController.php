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
                $this->view->pick('index/index');
            }
        }
        else {
            $this->session->auth = false;
            $this->view->pick('index/index');
        }
    }
}
