<?php
//
function get_nowDate(){
	$ret="";
	$dat = array();
	$db     =new ComMysql();
	
	$sql = "select DATE_FORMAT(now(),'%m%d') as now_str  from m_sv_mc limit 1;";
	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[0] = $row;
	}
	
	$ret = $dat[0]["now_str"];
	return $ret;
}
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
	$db     =new ComMysql();
	$smarty = new MySmarty();
	if(isset($_GET["sv_id"])){
		$max_id=0;
		$min_id=0;
		$i_ct =0;
		$dat = array();
		$sql = "select id, mc_name ,moi_num ";
		$sql = $sql ." , kai_num_1, vnum_1";
		$sql = $sql ." , kai_num_2, vnum_2";
		$sql = $sql ." , kai_num_3, vnum_3";
		$sql = $sql ." , kai_num_4, vnum_4";
		$sql = $sql ." , ck_num , created";
		$sql = $sql ." , modified";
		$sql = $sql ." ,(DATE_FORMAT((select max(created) from t_sv_sensor where sv_id=m_sv_mc.sv_id and mc_id =m_sv_mc.id),'%m-%d %H:%i') ) as up_last";
		$sql = $sql . ",sv_id, mc_id";
		$sql = $sql . " from m_sv_mc ";
		$sql = $sql . " where sv_id=" . $_GET["sv_id"];
		$sql = $sql . " order by id ";
		$sql = $sql . " limit 100;";
		
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[$i_ct] = $row;
			$i_ct += 1;
		}
		$s_nowStr = get_nowDate();
		
		$smarty->assign("result"      , $dat );
		$smarty->assign("title_message" , $_GET["sv_id"] . " / MC List");
		$smarty->assign("s_nowStr"    , $s_nowStr);

		//テンプレートの表示
		$smarty->disp_Layout("mc_index.tpl");	
	}else{
	    echo "failue,  Argment Error.";
	}

?>