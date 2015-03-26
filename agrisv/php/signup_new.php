<?php

//------------------------------------
// @calling
// @purpose : 
// @date
// @argment
// @return
//------------------------------------

//Smartyクラスの呼び出し
include_once("../libs/AppCom.php");

	$clsConst = new AppConst();
	
	session_start();
	$smarty = new MySmarty();
	
	//SESS_USER_NAME
	if(isset($_POST["txt_user_name"])){
		$db     =new ComMysql();
		$sql=       "INSERT INTO m_user (";
		$sql= $sql . " user_name";
		$sql= $sql . ",s_pass";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . " '" . $_POST["txt_user_name"] . "'";
		$sql= $sql . ",'" . $_POST["txt_pass"] . "'";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			print "Data Insert Error!";
			exit;
		}
		$_SESSION[ SESS_USER_NAME ]    = $_POST["txt_user_name"];
	    header( "Location: ../");
	}else{
	 print("Argment Error");
	}
?>