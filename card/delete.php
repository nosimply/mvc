<?php
require "test_my.class.php";
$testmy=test_my::getInstance($param);
$id=(int)$_GET['proid'];
$succ=$testmy->exec("delete from idcard where proid='$id' ");
if($succ){
	$sql="SET @i=0;UPDATE `idcard` SET `proid`=(@i:=@i+1);ALTER TABLE `idcard` AUTO_INCREMENT=0";
$testmy->exec($sql);
    header("location:shownews.php? ");
}
else{
    echo "delete error";
    exit;
}
?>
