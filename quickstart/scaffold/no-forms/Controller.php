<?php
$namespace$
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
$useFullyQualifiedModelName$

class $className$Controller extends $controllerBaseClass$
{
    /**
     * Index action
     */
    public function indexAction()
    {
      $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, '$fullyQualifiedModelName$', $_POST);
            $this->persistent->parameters = $query->getParams();
            if($this->request->getPost('limit'))
                {$limit = $this->request->getPost('limit');}
            else $limit = 10;
            $this->persistent->limit = $limit;
        } elseif ($this->request->getQuery("page", "int")) {
            $numberPage = $this->request->getQuery("page", "int");
        }
        else {
            $this->persistent->parameters = null;
            $this->persistent->limit = 10;
        }

        if ($this->persistent->limit) {
            $limit = $this->persistent->limit;
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "$pk$";

        $pluralVar$ = $className$::find($parameters);
        if (count($pluralVar$) == 0) {
            $this->flash->notice("The search did not find any $plural$");

            $this->dispatcher->forward([
                "controller" => "$plural$",
                "action" => "index"
            ]);

            return;
        }


      $paginator = new Paginator([
          'data' => $pluralVar$,
          'limit'=> $limit,
          'page' => $numberPage
      ]);

      $this->view->page = $paginator->getPaginate();
      $bind = $this->persistent->parameters['bind'];
      if($bind){
        foreach ($bind as $key => $value) {
          $this->tag->setDefault($key, trim($value,"%"));
        }
      }

      $this->tag->setDefault("limit", $limit);
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a $singular$
     *
     * @param string $pkVar$
     */
    public function editAction($pkVar$)
    {
        if (!$this->request->isPost()) {

            $singularVar$ = $className$::findFirstBy$pk$($pkVar$);
            if (!$singularVar$) {
                $this->flash->error("$singular$ was not found");

                $this->dispatcher->forward([
                    'controller' => "$plural$",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->$pk$ = $singularVar$->$pkGet$;

            $assignTagDefaults$
        }
    }

    /**
     * Creates a new $singular$
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "$plural$",
                'action' => 'index'
            ]);

            return;
        }

        $singularVar$ = new $className$();
        $assignInputFromRequestCreate$

        if (!$singularVar$->save()) {
            foreach ($singularVar$->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "$plural$",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("$singular$ was created successfully");

        $this->dispatcher->forward([
            'controller' => "$plural$",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a $singular$ edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "$plural$",
                'action' => 'index'
            ]);

            return;
        }

        $pkVar$ = $this->request->getPost("$pk$");
        $singularVar$ = $className$::findFirstBy$pk$($pkVar$);

        if (!$singularVar$) {
            $this->flash->error("$singular$ does not exist " . $pkVar$);

            $this->dispatcher->forward([
                'controller' => "$plural$",
                'action' => 'index'
            ]);

            return;
        }

        $assignInputFromRequestUpdate$

        if (!$singularVar$->save()) {

            foreach ($singularVar$->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "$plural$",
                'action' => 'edit',
                'params' => [$singularVar$->$pkGet$]
            ]);

            return;
        }

        $this->flash->success("$singular$ was updated successfully");

        $this->dispatcher->forward([
            'controller' => "$plural$",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a $singular$
     *
     * @param string $pkVar$
     */
    public function deleteAction($pkVar$)
    {
        $singularVar$ = $className$::findFirstBy$pk$($pkVar$);
        if (!$singularVar$) {
            $this->flash->error("$singular$ was not found");

            $this->dispatcher->forward([
                'controller' => "$plural$",
                'action' => 'index'
            ]);

            return;
        }

        if (!$singularVar$->delete()) {

            foreach ($singularVar$->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "$plural$",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("$singular$ was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "$plural$",
            'action' => "index"
        ]);
    }

}
