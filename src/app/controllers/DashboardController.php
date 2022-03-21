<?php

use Phalcon\Mvc\Controller;


class DashboardController extends Controller
{
    public function indexAction()
    {
    }
    public function operationAction()
    {
        $user = new Users();
        $blog = new Blogs();
        $action = $_POST['action'];
        switch ($action) {
            case 'getUsers':
                return $user->getUsers();
                break;
            case 'deleteUser':
                return $user->deleteUser($_POST['user_id']);
                break;
            case 'updateStatus':
                return $user->updateStatus($_POST['user_id'], $_POST['column'], $_POST['status']);
                break;
            case 'getUserBlog':
                return $blog->getUserBlog($_POST['user_id']);
                break;
            case 'getBlogs':
                return $blog->getBlogs();
                break;
            case 'addBlog':
                return $blog->addBlog($_POST['user_id'], $_POST['author'], $_POST['title'], $_POST['text'], $_POST['status']);
                break;
            case 'updateBlogStatus':
                return $blog->updateBlogStatus($_POST['blog_id'], $_POST['column'], $_POST['status']);
                break;
            case 'deleteBlog':
                return $blog->deleteBlog($_POST['blog_id']);
                break;
            case 'getBlog':
                return $blog->getBlog($_POST['blog_id']);
                break;
            case 'updateBlog':
                return $blog->updateBlog($_POST['blog_id'], $_POST['title'], $_POST['text']);
                break;
        }
    }
    public function adduserAction()
    {
    }
}
