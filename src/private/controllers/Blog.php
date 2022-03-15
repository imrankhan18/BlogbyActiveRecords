<?php
namespace App\Controllers;

use App\Libraries\Controller;

session_start();

class Blog extends Controller
{
    public function index()
    {
        $this->view('sample');
    }

    
    
    public function blog()
    {
            $blogdata=$_POST ?? array();
        if (isset($_POST['blogname'])=='') {
                $this->view('dashboard');

        } else {
                $blog=$this->model('Blogdetails');
                $blog->blogname=$blogdata['blogname'];
                $blog->type=$blogdata['type'];
                $blog->pic=$blogdata['f-upload'];
                $blog->save();
                $this->view('addblog');
                
                // // print_r($blogdata);
               
                // print_r($res);
                // $this->view('dashboard');
                // $this->blogHome($res);
        }
    }
    public function blogHome($res)
    {
        $blog=$this->model('Blogdetails');
        $res=$blog::all();
        
        $this->view('bloghome');
        $this->admin();
        $this->user();
       
        // print_r($res);
         
    }
    public function admin()
    {
        $this->view('dashboard');
        $_SESSION['show']='';
        $blog=$this->model('Blog');
        $_SESSION['details']=$blog::all();
        $result=array();
        foreach($_SESSION['details'] as $key=> $val){
            array_push($result,$val);
        }
        $_SESSION['details']=$result;
        // print_r($result);

        
        
            $_SESSION['show'].="<table class='table table-striped table-sm'>
            <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email </th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Status</th>
                      </tr></thead>";
        foreach($_SESSION['details'] as $k=>$v){
         
            // print_r($v);
            if($v->role=='admin') {
            $v->status="approve";
            $_SESSION['show'].="<tbody>
            <tr>
            <td>".$v->fullname."</td>
            <td>".$v->username."</td>
            <td>".$v->email."</td>
            <td>".$v->password."</td>
            <td>".$v->role."</td>
            <td>".$v->status."</td>
           
             <td><form action='' method='post'><button name='action' value=''></button></form></td>
            </tr>
            ";
        }
    }

        $_SESSION['show'].="</tbody></table>";

    }

    public function user()
    {
        $this->view('dashboard');
        $_SESSION['showusers']='';
        $blog=$this->model('Blog');
        $_SESSION['details']=$blog::all();
        $result=array();
        foreach($_SESSION['details'] as $key=> $val){
            array_push($result,$val);
        }
        $_SESSION['details']=$result;
        // print_r($result);

        
        
            $_SESSION['show'].="<h2>User's Profile</h2><table class='table table-striped table-sm'>
            <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email </th>
                        <th>Password</th>
                        <th>Role</th>
                      </tr></thead>";
        foreach($_SESSION['details'] as $k=>$v){
            $act="approve";
            $act1='app';
             if($v->status=='approve')
         {
             $act1='dis';
             $act='dissapprove';
         }
            // print_r($v);
            if($v->role=='user') {
            // $v->status="pending";
            $_SESSION['show'].="<tbody>
            <tr>
            <td>".$v->fullname."</td>
            <td>".$v->username."</td>
            <td>".$v->email."</td>
            <td>".$v->password."</td>
            <td>".$v->role."</td>
            
             <td><form action=''method='post'><button name='authenticate' value='".$act1."-".$v->userid."'>".$act."</button></form></td>
            </tr>
            ";
        }
    }
    
        $_SESSION['show'].="</tbody></table>";

        if(isset($_POST['authenticate'])) {
            $action=$_POST['authenticate'];
            echo "<h1>".$_POST['authenticate']."</h1>";
            $userid=substr($action, 4);
            print( $userid);
            $action=substr($action, 0, 3);
            print( $action);
            switch($action)
            {
              case 'app':
                {
                  $this->changeStatus($userid,"approve");
                  break;
                }
              case 'dis':
                {
                    $this->changeStatus($userid,"disappove");
                    break;
                }
            }
          
          
            }
}


function changeStatus($userid,$status)
{
        $blog=$this->model('Blog');
        $res=$blog::find($userid);
        $res->status=$status;
        $res->save();
        $this->view('bloghome');
        print_r($res);
        
}
    function array($rec)
    {
        return array(
            'fullname'=>$rec->fullname,
            'username'=>$rec->username,
            'email'=>$rec->email,
            'password'=>$rec->password,
            'role'=>$rec->role,
            'status'=>$rec->status
        );
    }
    public function addblog(){
        $this->view('addblog');
    }
 
}
