<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function IndexAction()
    {
        // return "Signup";
    }

    /**
     * action to register user
     *
     * @return void
     */
    public function registerAction()
    {
        // return '<h1>registered</h1>';
        $user = new Users();

        $user->name = $this->request->getPost()['name'];

        $user->password = $this->request->getPost()['password'];
        $user->email = $this->request->getPost()['email'];
        $user->role = 'user';
        $user->status = 'restricted';

        $success = $user->save();
        $email = $this->request->getPost()['email'];
        $data = Users::find(["email = '$email'"]);
        return json_encode($data);
    }

    /**
     * action to check mail already exists
     *
     * @return void
     */
    public function checkemailAction()
    {
        $email = $this->request->getPost()['email'];
        $data = Users::find(["email = '$email'"]);
        return json_encode($data);
    }
}
