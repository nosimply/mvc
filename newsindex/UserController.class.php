<?php
class UserController extends BaseController {
    use Jump;
    public  function  indexAction(){
        $name=$_POST['username'];
        $password=$_POST['password'];
        $model=new UserModel();
        if($ok=$model->myindex($name,$password)){

            $_SESSION['user']=$ok;
            //print_r($_SESSION);
           //phpinfo();
		   //exit;
           $this->success('indexm.php?c=news&a=shows', '登录成功');
        }
        else{
            $this->error('indexm.php?c=user&a=indexm', '登录失败');
        }
    }
    public  function  indexmAction(){
        require "index.html";
    }
}
