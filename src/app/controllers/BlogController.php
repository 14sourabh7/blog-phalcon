<?php

use Phalcon\Mvc\Controller;


class BLogController extends Controller
{
    public function indexAction()
    {
       
    }
    public function getblogAction(){
        $blog = new Blogs();
         $id = $_POST['blog_id'];
        return $blog->getBlog($id);
    }
}