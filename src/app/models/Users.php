<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $role;
    public $status;

    /**
     * checkUser($email, $password)
     * function to check user with email and password
     *
     * @param [type] $email
     * @param [type] $password
     * @return void
     */
    public function checkUser($email, $password)
    {
        $data = Users::find([
            'conditions'
            => "email='$email' AND password='$password'",
        ]);
        return json_encode($data);
    }

    /**
     * getUsers()
     * function to get all users from db
     *
     * @return void
     */
    public function getUsers()
    {
        $data = Users::find();
        return json_encode($data);
    }

    /**
     * deleteUser($id)
     * 
     * function to delete user with id
     *
     * @param [type] $id
     * @return void
     */
    public function deleteUser($id)
    {
        $user = Users::findFirst($id);
        $result =  $user->delete();
        return json_encode($result);
    }

    /**
     * updateStatus($id, $column, $status)
     * 
     * funtion to update user status
     *
     * @param [type] $id
     * @param [type] $column
     * @param [type] $status
     * @return void
     */
    public function updateStatus($id, $column, $status)
    {
        $user = Users::findFirst($id);
        $user->$column = $status;
        $result = $user->save();
        return json_encode($result);
    }
}
