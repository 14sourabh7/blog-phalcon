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

    public function getBlogs()
    {
        $data = Blogs::find();
        return json_encode($data);
    }
    public function getBlog($id)
    {
        $data = Blogs::find([
            'conditions' => "blog_id = '$id'"
        ]);
        return json_encode($data);
    }
    public function getUserBlog($id)
    {
        $data = Blogs::find([
            'conditions' => "user_id = '$id'"
        ]);
        return json_encode($data);
    }
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
    public function updateBlogStatus($id, $column, $status)
    {
        $blog = Blogs::findFirst($id);
        $blog->$column = $status;
        $result = $blog->save();
        return json_encode($result);
    }
    public function deleteBlog($id)
    {
        $blog = Blogs::findFirst($id);
        $result =  $blog->delete();
        return json_encode($result);
    }
    public function updateBlog($id, $title, $text)
    {
        $blog = Blogs::findFirst($id);
        $blog->title = $title;
        $blog->text = $text;
        $result = $blog->save();
        return json_encode($result);
    }
}
