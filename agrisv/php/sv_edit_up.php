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

	$title_message="新規登録";
	
	// セッション開始
	session_start();
	
	//MySmartyインスタンス生成
	$smarty = new MySmarty();
	
	$s_image ="";	
	if(isset($_POST["h_mc_id"])){
		
		$db     =new ComMysql();
		$sql = "update m_sv ";
		$sql = $sql . " set sv_name='" . $_POST["txt_sv_name"] . "'";
		$sql = $sql . " ,biko='" . $_POST["txt_biko"] . "'";
		$sql = $sql . " ,modified=now()";
		$sql = $sql . " where id=" . $_POST["h_mc_id"] ;
		
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			print "Data Error!";
			exit;
		}
		
		//flash_notice
		$smarty->assign("title_message", $title_message );
		$smarty->assign("flash_notice", "Complete Update." );
		
		header( "Location: ./sv_index.php");
	}else{
	 print("Argment Error");
	}
?>