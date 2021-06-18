<?php
class BbaseController extends Basecontroller {
    use Jump;
    public  function  __construct()
    {
        parent::__construct();

        $this->checklogin();
    }
    private  function  checklogin(){
        if(empty($_SESSION['user'])){
            //print_r($_SESSION);
           $this->error('indexm.php?c=user&a=indexm', '登录错误');
        }
    }
}