<?php
class Session{
    private $sesspdo;
    public function __construct(){
        session_set_save_handler(
            [$this,'open'],
            [$this,'close'],
            [$this,'read'],
            [$this,'write'],
            [$this,'destroy'],
            [$this,'gc']
        );
        session_start();
    }
public function open(){
    $param=array();
    $this->sesspdo=mypdo::getInstance($param);
    return true;
}
    public function  close(){
    return true;
}
    public function  read($sess_id){
    $sql="select sess_value from sess where sess_id='$sess_id'";
    $mm=$this->sesspdo->fetchall($sql);
        return  (string)$mm[0]['sess_value'];
}
    public function write($sess_id,$sess_value)
{
   $sql = "INSERT INTO sess  VALUES ('$sess_id','$sess_value',unix_timestamp()) on duplicate key update sess_value='$sess_value',sess_time=unix_timestamp()";
    return $this->sesspdo->exec($sql)!==false;
}
    public function  destroy($sess_id){
     $sql="delete from sess where sess_id='$sess_id'" ;
}
    public function  gc($lifetime){
$expires=time()-$lifetime;
$sql="delete  from sess where sess_time < $expires ";
return $this->sesspdo->exec($sql)!==false;
}
}
