<?php

//------------------------------------
// @calling
// @purpose : 
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
	if(isset($_GET["sv_id"])){
		$datMc = com_getSvDat($db, $_GET["sv_id"] );
//var_dump($datMc);
		if($datMc==NULL){
			$datParam["stat"]   =ER_STAT_102;
			$datParam["param"]  ="";
			$datRes["ret"]     = NG_CODE;
			$datRes["dat"] = $datParam;
			echo(json_encode($datRes ) );
			exit;
		}else{
			if( com_isUserAuth($db, $_GET["user_name"] , $_GET["password"] ) ==FALSE){
				$datParam["stat"]   =ER_STAT_104;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
				exit;
			}			
			if(com_convertMs($db, $_GET["sv_id"])==FALSE){
				$datParam["stat"]   =ER_STAT_101;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
				exit;
			}	
			if(com_convert2($db, $_GET["sv_id"])==FALSE){
				$datParam["stat"]   =ER_STAT_101;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
				exit;
			}
			if(com_convertValve($db, $_GET["sv_id"])==FALSE){
				$datParam["stat"]   =ER_STAT_101;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
				exit;
			}
			if( com_savePost($db, $_GET["sv_id"] , $clsConst->MSG_015 ) ==FALSE){
				$datParam["stat"]   =ER_STAT_101;
				$datParam["param"]  ="";
				$datRes["ret"]     = NG_CODE;
				$datRes["dat"] = $datParam;
				echo(json_encode($datRes ) );
				exit;
			}			

			$datParam["stat"]   =ER_STAT_000;
			$datParam["param"]  ="";
			$datRes["ret"]     = OK_CODE;
			$datRes["dat"] = $datParam;
			echo(json_encode($datRes ) );
		}
	}else{
		$datParam["stat"]   =ER_STAT_000;
		$datParam["param"]  ="";
		$datRes["ret"]     = NG_CODE;
		$datRes["dat"] = $datParam;
		echo(json_encode($datRes ) );
	}

?>