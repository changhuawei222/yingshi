<?php
error_reporting(0);// 这行是屏蔽所有可能出现的错误信息
header("Content-Type: text/html; charset=utf-8");
if( !headers_sent() && extension_loaded("zlib") && strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){ ini_set('zlib.output_compression', 'On');ini_set('zlib.output_compression_level', '4');} 
function createFolder($path){ 
   if (!is_dir($path)){ 
     createFolder(dirname($path)); 
     mkdir($path, 0777); 
   } 
}
function back404(){
	header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
	echo file_get_contents(ROOT_PATH.'/404.html');
	exit;
}
function urlsafe_b64decode($string) {
	$data = str_replace(array('-','_'),array('+','/'),$string);
	$mod4 = strlen($data) % 4;
	if ($mod4) {
		$data .= substr('====', $mod4);
	}
	return base64_decode($data);
}
function curlgets($url){
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER ['HTTP_USER_AGENT'].'ver_1.2'.$_SERVER["HTTP_REFERER"]);//此处请勿修改
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
$page_content = curl_exec($ch); 
curl_close($ch); 
return $page_content; 
}

function html_data($val,$t = 'ls'){
	$list = '';
	$time=86400;
	if($t == 'ls'){
		$ab = 'list/'.$_GET['id'];
		$h_url = 'http://y.9dan.cc/api.php?t=ls&id='.$_GET[id].'&cat='.$_GET[cat].'&area='.$_GET[area].'&year='.$_GET[year].'&act='.$_GET[act].'&rank=rankhot&page='.$_GET[page]; 
		$html = $h_url;
	}elseif($t == 's'){
		$ab = 'search';
		$h_url='http://y.9dan.cc/api.php?t=s&k='.$val; 
		$html = $val; 
	}else{		
		if($t == 'zy'){
			$lys=explode('_',$val);
			$ab = 'play';
			$h_url='http://y.9dan.cc/api.php?t='.$t.'&k='.$val; 
			$html = $h_url; 
		}else{
			$lys=explode('_',$val);
			$ab = 'play';	
			$h_url='http://y.9dan.cc/api.php?t='.$t.'&k='.$val;
			$html = $h_url; 
		}
	}
	$dir = ROOT_PATH.'/data/'.$ab.'/';
	$file = $dir.'json_'.md5($html);
	if(is_file($file) && time()-filemtime($file)<$time){
	   $xtime = 1;
	}else{
		$xtime = 0;
	}
	if(is_file($file) && $xtime){
		$list = json_decode(file_get_contents($file),true);
	}else{
			$data=curlgets($h_url);
			$list=urlsafe_b64decode($data);
			$list=json_decode($list,true);	
		if($list){
			if(!is_dir($dir)){
			   createFolder($dir);	
			}		
			file_put_contents($file,json_encode($list));
		}elseif(is_file($file)){
			$list = json_decode(file_get_contents($file),true);
		}
	}
	return $list;
}
?>