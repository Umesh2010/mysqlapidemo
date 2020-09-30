<?php
require './config.php';
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST['uname']) && isset($_POST['ucity']) && isset($_POST['ucontact']) && isset($_POST['uimage']) && isset($_POST['upassword']))
{
	if ($_POST['uname'] == "" || $_POST['ucity'] == "" || $_POST['ucontact'] == "" || $_POST['uimage'] == "" || $_POST['upassword'] == "") 
	{
		$return["STATUS"]=200;
        $return["MSG"]="Please Enter proper details";
	}
	else {
		$Data["Name"]=$_POST['uname'];
		$Data["City"]=$_POST['ucity'];	
		$Data["Contact"]=$_POST['ucontact'];
		$Data["Pic"]=$_POST['uimage'];
		$Data["Password"]=$_POST['upassword'];

	    $result = $obj->myInsert("user", $Data);
	        
	    if($result)
	    {
	        $return["STATUS"]=200;
	        $return["MSG"]="Insert Successfull";
	        //$return = "Insert Successfull";
	    }
	    else
	    {        
	        $return["MSG"]="Insert Fail";
	    }
	}
}
else 
{
    $return["STATUS"]=200;
    $return["MSG"]="This is post method";
}
echo json_encode($return);