<?php

class DashboardController extends ControllerAdmin
{

    public function indexAction()
    {

    }

    public function tutorialAction($slug)
    {
        $post = Post::findFirstByslug($slug);
        if(!$post){
            $this->flash->error('There is no post with slug = ' . $slug);
        }
       $this->view->post = $post;
    }

    public function imageAction($name)
    {
        
    }
}
