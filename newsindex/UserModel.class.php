<?php
class UserModel extends Model
{
    public function myindex($name, $password)
    {
        $res = $this->mypdos->fetchall("select password from userboot where username='$name'");
if($res[0]["password"]==$password){
    return $res[0]['password'];
}else{
    return false;
}
    }
}
