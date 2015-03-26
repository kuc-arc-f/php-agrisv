<?php
//------------------------------------
// @calling
// @purpose : マスタ追加
// @date
// @argment
// @return
//------------------------------------
include_once("../libs/AppCom.php");
	$clsConst = new AppConst();
	$db     =new ComMysql();
	
	session_start();
	$ret_base= "000000000000000000000000";
	$datParam=array();
	$datRes =array();
	
	if(isset($_POST["sv_id"])){
		$head="va_";
		$fnm = "../dat/" . $head . $_POST["sv_id"] . ".csv";
		$datMc = com_getSvDat($db, $_POST["sv_id"] );
//var_dump($datMc);
		if($datMc==NULL){
			$datParam["stat"]   =ER_STAT_102;
			$datParam["param"]  ="";
			$datRes["ret"]     = NG_CODE;
			$datRes["dat"] = $datParam;
			echo(json_encode($datRes ) );
		}else{
			if( com_isUserAuth($db, $_POST["user_name"] , $_POST["password"] ) ==FALSE){
				$datParam["stat"]   =ER_STAT_104;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
				exit;
			}			
			if( com_savePost($db, $_POST["sv_id"] , $clsConst->MSG_014 ) ==FALSE){
				$datParam["stat"]   =ER_STAT_101;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
				exit;
			}
			$sCsv  = str_replace('\"',  '"',  $_POST["dvalve"] );
			com_fileMst( $_POST["sv_id"] , $sCsv , $fnm);
			if(com_saveWkValve_4($db, $_POST["sv_id"] ,  $fnm )){
				$datParam["stat"]   =ER_STAT_000;
				$datParam["param"]  ="";
				$datRes["ret"]     = OK_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
			}else{
				$datParam["stat"]   =ER_STAT_102;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
			}
		}
	}else{
		$datParam["stat"]   =ER_STAT_000;
		$datParam["param"]  ="";
		$datRes["ret"]     = NG_CODE;
		$datRes["dat"] = $datParam;
		echo(json_encode($datRes ) );
	}

?>