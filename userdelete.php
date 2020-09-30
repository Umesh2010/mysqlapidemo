<?php
require './config.php';
header('Content-Type: application/json');

$obj=new Config();
if(isset($_GET['uid']))
{
    $Data["Id"]=$_GET['uid'];

    $result = $obj->myDelete("user", $Data);
        
    if($result)
    {
        $return["STATUS"]=200;
        $return["MSG"]="Delete Successfull";
    }
    else
    {
        //$return["STATUS"]=false;
        $return["MSG"]="Delete Fail";
    }
}  
else 
{
    $return["STATUS"]=200;
    $return["MSG"]="This is post method";
}
echo json_encode($return);