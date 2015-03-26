<?php
//

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
	
	// セッション開始
	session_start();
	if (isset($_COOKIE[ SYS_COOK_USER ])) {
		$db     =new ComMysql();
		$smarty = new MySmarty();
		$i_ct =0;
		$dat = array();
		$sql = "select id, sv_name , biko ";
		$sql = $sql . " from m_sv ";
		$sql = $sql . " order by id ";
		$sql = $sql . " limit 100;";
		
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[$i_ct] = $row;
			$i_ct += 1;
		}
		$smarty->assign("result"      , $dat );
		$smarty->assign("title_message" , "Server List");
		$smarty->disp_Layout("sv_index.tpl");
	}else{
	 echo $clsConst->MSG_ERROR_001;
	}
?>