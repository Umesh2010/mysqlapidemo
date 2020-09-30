<?php
require './config.php';
header('Content-Type: application/json');

$obj=new Config();
if(isset($_GET['uname']) && isset($_GET['upassword']))
{    
	if ($_GET['uname'] == "" || $_GET['upassword'] == "") {
		$return["STATUS"] = 200;
        $return["MSG"] = "Enter email and password";
	} else {
		$Data["Name"]=$_GET['uname'];
		$Data["Password"]=$_GET['upassword'];

		$result = $obj->myLogin("user", $Data, "AND");

		if ($result)
		{     
		    if($result->num_rows != 0)
		    {
		        $return["STATUS"] = 201;
		        $return["MSG"] = "User Found";   
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
}
else 
{
    //$return["STATUS"]=false;
    $return["MSG"]="Welcome To my api";
}
echo json_encode($return);