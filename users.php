<?php
require './config.php';
header('Content-Type: application/json');

$obj=new Config();
$result = $obj->mySelect('user');

if ($result)
{     
    if($result->num_rows != 0)
    {
    	$return["DATA"] = array();
        $return["STATUS"] = 200;
        $return["MSG"] = "User Found";   
        $return["COUNT"] = $result->num_rows;

        $j=1;         
        for ($i=0; $i < $result->num_rows ; $i++) { 
            $row=$result->fetch_assoc();
            $info = array();
            array_push($return["DATA"], $row);
            //$return["data"] = $row;
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
echo json_encode($return);