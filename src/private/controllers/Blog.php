<?php
namespace App\Controllers;

use App\Libraries\Controller;

class Blog extends Controller
{
    public function index()
    {
        $this->view('sample');
    }

    public function addUser()
    {
        
        $postdata = $_POST ?? array() ;
        // print_r( $postdata);
        if (isset($postdata["fullname"]) && isset($postdata["username"]) && isset($postdata["email"]) && isset($postdata["password"])) {
            $user = $this->model('Blog');
            $user->fullname=$postdata["fullname"];
            $user->username=$postdata["username"];
            $user->email=$postdata["email"];
            $user->password=$postdata["password"];
            $user->role="user";
            $user->status="pending";
            $user->save();
        }
        // $data['user']=$this->model('Blog')::all();
        $this->view('signup');
    }
    public function signIn()
    {
        $data = $_POST ?? array() ;
        // print_r($data);

        $this->view('login');
        $user=$this->model('Blog');
        $result=$user::find_by_email_and_password($_POST['email'], $_POST['password']);
        if ($result=='') {
            echo "<h1>Not Present in DB</h1>";
        } else {
             "<h1>Login successfull</h1>"."<br>";
            //  header("location:blog");
        }
    }
    public function blog()
    {
        $blogdata=$_POST ?? array();

            $blog=$this->model('Blogdetails');
            $blog->blogname=$blogdata['blogname'];
            $blog->type=$blogdata['type'];
            $blog->save();
            $this->view('dashboard');
            print_r($blogdata);

    }
    public function blogHome()
    {
        // $data = $_POST ?? array() ;
        $this->view('bloghome');
        print_r($_POST);
        $blog=$this->model('Blogdetails');
        $res=$blog::find_by_blogname("something Funny");
        print_r($res);
        //print_r("<h1>fdesssssssssssssssssssssssssssssssss".$res."<h1>");
         
        
    }
}
