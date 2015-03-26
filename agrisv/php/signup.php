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
	
	// セッション開始
	session_start();
	$smarty = new MySmarty();
	// $smarty->assign("result"      , $dat );
	$smarty->assign("title_message" , "Sign Up");

	//テンプレートの表示
	//$smarty->disp_Layout("signup.tpl");	
	$smarty->display($smarty->template_dir . "/Layout/yt_head_no.tpl");	
	$smarty->display($smarty->template_dir . "/signup.tpl" );
	$smarty->display($smarty->template_dir . "/Layout/yt_foot.tpl");
?>