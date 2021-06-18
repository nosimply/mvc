<?php
class NewsController extends BbaseController {
public  function  showsAction(){
$model=new NewsModel();
$res_gets=$model->getnews();
require "./mynews.html";
}
public function delAction(){
    $id=$_GET['proid'];
    $model=new NewsModel();
    if($model->delnews($id)){
        $modelnext=new NewsModel();
        $modelnext->delnext();
        header('location:indexm.php?c=news&a=shows');
    }
else{
    echo "error";
}
}
    public  function  fixnextAction()
    {
        $id=$_GET['proid'];
        $model=new NewsModel();
        $result=$model->getnews();
        require "./fixnews.html";
    }

public  function  alertAction(){
        $id= $_POST["proid"];
        $tlt=$_POST["protitle"];
        $comm=$_POST["procomment"];
        $sname=$_POST["proname"];
    $model=new NewsModel();
   if($model->alertnews($id,$tlt,$comm,$sname)){
        header('location:indexm.php?c=news&a=shows');
    }else{
       echo "error";
   }
}
public function fixAction(){
    $mykeys=$_POST["keys"];
    $id = $_POST["proid"];
    $tlt=$_POST["protitle"];
    $comm=$_POST['procomment'];
    $sname=$_POST['proname'];
    $model=new NewsModel();
    $model->fixnews($mykeys,$id,$tlt,$comm,$sname);
    header('location:indexm.php?c=news&a=shows');
}
public  function serchAction(){
$id=$_POST['carid'];
echo $id;
$model=new NewsModel();
    $result=$model->serchnews($id);
    require "./serchnews.html";
}

}
