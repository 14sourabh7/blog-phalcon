<?php

use Phalcon\Mvc\Model;

class Blogs extends Model
{
    public $blog_id;
    public $user_id;
    public $title;
    public $author;
    public $date;
    public $text;
    public $status;

    /**
     * getBlogs()
     * function to fetch all blogs from db
     *
     * @return void
     */
    public function getBlogs()
    {
        $data = Blogs::find();
        return json_encode($data);
    }

    /**
     * getBlog($id)
     * function to fetch single blog with id
     *
     * @param [type] $id
     * @return void
     */
    public function getBlog($id)
    {
        $data = Blogs::find([
            'conditions' => "blog_id = '$id'"
        ]);
        return json_encode($data);
    }

    /**
     * getUserBlog($id)
     * function to all blogs of particular user
     *
     * @param [type] $id
     * @return void
     */
    public function getUserBlog($id)
    {
        $data = Blogs::find([
            'conditions' => "user_id = '$id'"
        ]);
        return json_encode($data);
    }

    /**
     * addBlog($id,$author,$title,$text,$status)
     * 
     * function to add blog
     *
     * @param [type] $id -> user_id
     * @param [type] $author
     * @param [type] $title
     * @param [type] $text
     * @param [type] $status
     * @return void
     */
    public function addBlog($id, $author, $title, $text, $status)
    {
        $blog = new Blogs();
        $blog->user_id = $id;
        $blog->title = $title;
        $blog->author = $author;
        $blog->text = $text;
        $blog->status = $status;
        $result =  $blog->save();
        return json_encode($result);
    }

    /**
     * updateBlogStatus($id, $column, $status)
     * 
     * function to update blog status
     *
     * @param [type] $id
     * @param [type] $column
     * @param [type] $status
     * @return void
     */
    public function updateBlogStatus($id, $column, $status)
    {
        $blog = Blogs::findFirst($id);
        $blog->$column = $status;
        $result = $blog->save();
        return json_encode($result);
    }

    /**
     * deleteBlog($id)
     * 
     * function to deleteBlog
     *
     * @param [type] $id
     * @return void
     */
    public function deleteBlog($id)
    {
        $blog = Blogs::findFirst($id);
        $result =  $blog->delete();
        return json_encode($result);
    }

    /**
     * updateBlog($id, $title, $text)
     * 
     * function to update blog
     *
     * @param [type] $id
     * @param [type] $title
     * @param [type] $text
     * @return void
     */
    public function updateBlog($id, $title, $text)
    {
        $blog = Blogs::findFirst($id);
        $blog->title = $title;
        $blog->text = $text;
        $result = $blog->save();
        return json_encode($result);
    }
}
