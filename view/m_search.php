<?php
if(empty($_GET[k])){
	header("Location:index.php");
	exit();
}
if(strstr($_GET['k'],'http')){
	$urls[urls][url][0]=$_GET['k'];$urls[urls][ly][0]='自定义';
	$mbz=base64_encode(gzdeflate(json_encode($urls)));
	$mbz=str_replace('+','/',$mbz);
	header("Location:?mode=show&id=".$mbz);
	exit;
}
$list = html_data($_GET[k],'s');
if(!empty($list['search'])){
$jiesao = $list['search'][0][jiesao];
$leixing = strip_tags($list['search'][0][leixing]);
}
$keys=$leixing.$_GET[k].'搜索结果';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv=”Cache-Control” content=”no-transform” />
<meta http-equiv=”Cache-Control” content=”no-siteapp” />
<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title><?php echo $keys.' - '.$config['sitename'];?></title>
<meta name="keywords" content="<?php echo $_GET[k];?>全集,<?php echo $_GET[k];?>高清,<?php echo $_GET[k];?>在线播放,<?php echo $_GET[k];?>下载" />
<meta name="description" content="<?php echo $_GET[k];?> 剧情简介：<?php echo $jiesao;?>" />
<link href="./moban/styles.css" rel="stylesheet" type="text/css"></head><body>
<?php
include ('./view/headter.php');
if(!empty($list['search'])){
	foreach ($list["search"] as $k => $v) {
		echo '</br><div style="float:left;margin-right:10px;"><img src="'.$v[img].'"  style="height:180px;"/></div>';if(!empty($v[urls][ly][0])){echo '<h3><a href="http://'.$config['siteurl'].'/?mode=search&k='.$v[name].'" target="_blank">'.$v[name].'</a></h3><ul><a href="http://'.$config['siteurl'].'/?mode=show&id='.md5($_GET[k]).$k.'" target="_blank">(立即播放)</a></ul>';}else{echo '<h3><a href="http://'.$config['siteurl'].'/?mode=search&k='.$v[name].'" target="_blank">'.$v[name].'</a>(暂无资源)</h3>';}echo $v[leixing].$v[jj].'<br>影片 <b>'.$v[name].'</b> 详细信息：'.$v[jiesao].'<div style="clear:both;"></div><hr>';	
	}	
}else{echo '<br><div align="center" style="font-size:20px;"><p>未找到有关 <b>'.$_GET[k].'</b> 影片的相关信息！！</p></div>';}
include ('./view/footer.php');	
?> 