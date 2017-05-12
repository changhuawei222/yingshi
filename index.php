<?php
define('ROOT_PATH',dirname(__FILE__));
include ('./inc/global.php');
include ('./inc/config.php');
$mode=$_GET[mode];
if(empty($mode)){$mode='index';}
$mode_arr = array('m_index','m_search','m_show');
if(in_array('m_'.$mode,$mode_arr)){
	include('./view/m_'.$mode.'.php');	
}else{
	echo '404';
}
?>