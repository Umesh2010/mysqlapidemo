<?php

class config {
    public $con;
    public $MYAPIKEY;
    public $CURRENTDATE;

    public function __construct() {
        $HOSTNAME = "localhost";
        $USERNAME = "root";
        $PASSWORD = "";
        $DATABASE = "api_demo";
        date_default_timezone_set("Asia/Kolkata");
        $this->con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
        if (!$this->con) {
            echo "Not Connected...";
        }
        $this->MYAPIKEY=100;
        $this->CURRENTDATE=  date("Y-m-d h:i:s");
    }

    public function myInsert($tblName,$data)
    {
        $fieldval="";
        foreach ($data as $fieldName=>$value)
        {
            $fieldval = $fieldval."`".$fieldName."`='".$value."',";
        }
        
        $fieldval=trim($fieldval,",");
        $query = "INSERT INTO `$tblName` SET $fieldval";        
        return $this->con->query($query);
    }

    public function myUpdate($tblName,$data)
    {
        $i = 0;
        $fieldval="";
        $wheres= "";
        foreach ($data as $fieldName=>$value)
        {
            if($i == 0){
                $wheres = $fieldName."=".$value."";
                ++$i;
            }
            else{
                $fieldval = $fieldval."`".$fieldName."`='".$value."',";
            }
        }   
        $fieldval=trim($fieldval,",");
        $query = "UPDATE `$tblName` SET $fieldval WHERE $wheres";
        return $this->con->query($query);
    }

    public function myDelete($tblName,$data)
    {
        $fieldval="";
        foreach ($data as $fieldName=>$value)
        {
            $fieldval = $fieldval."`".$fieldName."`='".$value."',";
        }
        $fieldval=trim($fieldval,",");
        $query = "DELETE from `$tblName` WHERE $fieldval";        
        return $this->con->query($query);
    }

    public function myLogin($tblName,$whereData,$op=" AND ")
    {
        $wh = " WHERE ";
        foreach ($whereData as $fieldName=>$value)
        {
            $wh = $wh."".$fieldName."='".$value."' $op ";
        }
        $wh = trim($wh,"$op ");
        
        $query = "SELECT * FROM $tblName $wh";
        return $this->con->query($query);
    }

    public function mySelectand($tblName,$where=NULL,$op=" AND ")
    {
        $wh="";
        if($where!=NULL)
        {
            $wh.=" WHERE ";
            foreach ($where as $fieldName => $value) {
                $wh=$wh."`".$fieldName."`='".$value."' $op ";
            }
            $wh=trim($wh,"$op ");
        }
        $query="SELECT * FROM $tblName $wh";
        return $this->con->query($query);
    }

    public function mySelector($tblName,$whereData,$op=" OR ")
    {
        $wh = " WHERE ";
        foreach ($whereData as $fieldName=>$value)
        {
            $wh = $wh."".$fieldName."='".$value."' $op ";
        }
        $wh = trim($wh,"$op ");
        $query="SELECT * FROM $tblName $wh";
        return $this->con->query($query);
    }

    public function mySelect($tblName)
    {
        $query = "SELECT * from $tblName";
        return $this->con->query($query);        
    }
}