<?php
require './config.php';
header('Content-Type: application/json');

$obj=new Config();
if(isset($_GET['uid']))
{
    $Data["Id"]=$_GET['uid'];

    $result = $obj->mySelectand("user", $Data);
        
    if ($result)
    {     
        if($result->num_rows != 0)
        {
            $return["STATUS"] = 201;
            $return["MSG"] = "Successfull";   
            $j=1;         
            for ($i=0; $i < $result->num_rows ; $i++) { 
                $row=$result->fetch_assoc();
                $return["user"] = $row;
                $j++;                
            }
        }
        else
        {
            $return["STATUS"] = 404;
            $return["MSG"] = "Data Not Found!";
        }
    }
    else
    {
        //$return["STATUS"] = false;
        $return["MSG"] = "Fail";
    }
}  
else 
{
    $return["STATUS"]=200;
    $return["MSG"]="This is post method";
}
echo json_encode($return);