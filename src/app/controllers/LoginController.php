<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
    }

    /**
     * action to verify user credentials for login
     *
     * @return void
     */
    public function checkuserAction()
    {
        $user = new Users();
        $email = $this->request->getPost()['email'];
        $password = $this->request->getPost()['password'];
        return $user->checkUser($email, $password);
    }
}
