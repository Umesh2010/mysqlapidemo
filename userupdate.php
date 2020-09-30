<?php
require './config.php';
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST['uid']) && (isset($_POST['uname']) || isset($_POST['ucity']) || isset($_POST['ucontact']) || isset($_POST['uimage']) || isset($_POST['upassword'])))
{	
	$Data["Id"]=$_POST['uid'];

	if (isset($_POST['uname'])) {
		$Data["Name"]=$_POST['uname'];
	} 
	if (isset($_POST['ucity'])) {
		$Data["City"]=$_POST['ucity'];
	}
	if (isset($_POST['ucontact'])) {
		$Data["Contact"]=$_POST['ucontact'];
	}
	if (isset($_POST['uimage'])) {
		$Data["Pic"]=$_POST['uimage'];
	}
	if (isset($_POST['upassword'])) {
		$Data["Password"]=$_POST['upassword'];
	}

    $result = $obj->myUpdate("user", $Data);
        
    if($result)
    {
        $return["STATUS"]=200;
        $return["MSG"]="Update Successfull";
    }
    else
    {
        //$return["STATUS"]=false;
        $return["MSG"]="Update Fail";
    }
}
else 
{
	if (!isset($_POST['uname'])) {
		$return["STATUS"]=200;
    	$return["MSG"]="Enter envalid details";
	}
	else {
		$return["STATUS"]=200;
    	$return["MSG"]="This is post method";
	}
}
echo json_encode($return);