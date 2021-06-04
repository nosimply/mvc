<?php
class NewsModel extends Model
{
    public function getnews()
    {
        return $this->mypdos->fetchall("select * from news");
    }

    public function delnews($id)
    {
        return $this->mypdos->exec("delete from news where proid='$id' ") ;
    }
    public  function  delnext(){
        $sql = "SET @i=0;UPDATE `news` SET `proid`=(@i:=@i+1);ALTER TABLE `news` AUTO_INCREMENT=0";
        $this->mypdos->exec($sql);
    }
    public function fixnews($mykeys,$id,$tlt,$comm,$sname)
    {
       $sql= "UPDATE news SET id='$id',titie='$tlt',comment='$comm',name='$sname'  WHERE proid=$mykeys";
        return $this->mypdos->exec($sql);
    }

    public function alertnews($i,$t,$c,$n)
    {
        $sql="INSERT INTO news (id,titie,comment,name) VALUES ('$i','$t','$c','$n')";
        return $this->mypdos->exec($sql);
    }

    public  function  serchnews($id){
       return  $this->mypdos->fetchall("select * from news where id like '%{$id}%' ");
    }
}

