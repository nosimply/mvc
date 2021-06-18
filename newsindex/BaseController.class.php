<?php
class Basecontroller{
    public  function  __construct()
    {
        $this->initsess();
    }

    public function  initsess(){
        new Session();
    }
}
