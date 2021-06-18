<?php
spl_autoload_register(function($class_name){
require "./{$class_name}.class.php";
});
$c=$_GET['c']??"User";
$a=$_GET['a']??"indexm";
$c=ucfirst(strtolower($c));
$a=strtolower($a);
$conseller_name=$c."Controller";
$conac_name=$a."Action";

$rems=new $conseller_name();
$rems->$conac_name();




