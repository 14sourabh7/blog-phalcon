<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->users = Users::find();
    }
    public function operationAction(){

        $blog= new Blogs();
        $action = $_POST['action'];
        switch ($action){
            case 'getBlogs':
                return $blog->getBlogs();
                break;
        }
    }
}
