<?php
//------------------------------------
// @calling
// @purpose : New, Update
// @date
// @argment
// @return
//------------------------------------

//Smartyクラスの呼び出し
include_once("../libs/AppCom.php");

	$title_message="New";
	
	// セッション開始
	session_start();
	
	//MySmartyインスタンス生成
	$smarty = new MySmarty();
	
	$s_image ="";	
	if(isset($_POST["txt_sv_name"])){
//var_dump( mb_detect_encoding($s_title) );
// var_dump( $s_title);
//exit;
		
		$db     =new ComMysql();
		$sql="";
		//$sql= $sql . "INSERT INTO m_mcs (mc_name) values ('mc1');";
		$sql= $sql . "INSERT INTO m_sv (";
		$sql= $sql . "sv_name";
		$sql= $sql . ", biko";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . " '" . $_POST["txt_sv_name"] . "'";
		$sql= $sql . ",'" . $_POST["txt_biko"] . "'";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		
//var_dump($sql);
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			print "Data Insert Error!";
			exit;
		}
		
		//flash_notice
		$smarty->assign("title_message", $title_message );
		
		//テンプレートの表示
		header( "Location: ./sv_index.php");
	}else{
	 print("Argment Error");
	}
?>