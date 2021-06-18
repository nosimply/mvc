<?php
class Model{
    protected  $mypdos;
    public function __construct(){
    $this->initmodels();
    }
private function   initmodels(){
    $param=array();
    $this->mypdos=mypdo::getInstance($param);
}
}