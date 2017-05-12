<?php
$aa = substr($_GET['id'] , 35);
if(empty($aa)){
$n = substr($_GET['id'] , 32);
$dir = ROOT_PATH.'/data/search/';
$fn=substr($_GET['id'] , 0 , 32);
$file = $dir.'json_'.$fn;	
$list = json_decode(file_get_contents($file),true);
$search = $list["search"][$n];
}else{
$urls=json_decode(gzinflate(base64_decode(str_replace('/','+',$_GET['id']))));
$search[urls][url]=$urls->urls->url;$search[urls][ly]=$urls->urls->ly;$search[name]=$urls->name;$search[id]='dy';$search[jiesao]=$urls->name;
} 
$keys=$search[name].'在线播放';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv=”Cache-Control” content=”no-transform” />
<meta http-equiv=”Cache-Control” content=”no-siteapp” />
<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title> <?php echo $keys.' - '.$config['sitename'];?></title>
<meta name="keywords" content="<?php echo $search[name];?>全集在线播放,<?php echo $search[name];?>高清在线播放" />
<meta name="description" content="<?php echo $search[name];?> 剧情简介：<?php echo $search[jiesao];?>" />
<link href="./moban/styles.css" rel="stylesheet" type="text/css">
<?php include ('./view/headter.php');?>
<div class="menu" id="mulu"> <ul><li style="float:left;width:130px;"><a href="javascript:history.back();" style="color:red;background:#ADF3AD;">返回</a></li>
<?php
if($_SERVER['HTTPS']=='on'){$target=' _blank';}else{$target='myframe';}$jkjk=explode('|||',$config['url']);if(empty($_GET[jx])){$_GET[jx]='0';}$jxjk=$jkjk[$_GET[jx]];
	for($k=0;$k<count($jkjk);$k++){
		$suzi=$k+1;
		echo '<li style="float:left;width:130px;"><a href="?mode=show&id='.$_GET['id'].'&jx='.$k.'&ly='.$_GET['ly'].'"  style="color:red;background:#ADF3AD;">线路'.$suzi.'</a></li>';
	}
	echo '</ul><div style="clear:both;"></div><ul>';

	for($i=0;$i<count($search[urls][ly]);$i++){
		echo '<li style="float:left;width:130px;"><a href="?mode=show&id='.$_GET['id'].'&jx='.$_GET['jx'].'&ly='.$search[urls][ly][$i].'"  style="color:red;background:#ADAFF3;">来源：'.$search[urls][ly][$i].'</a></li>';
		if($_GET['ly']==$search[urls][ly][$i]){$bm=$i;}
	}
echo '</ul><div style="clear:both;"></div><ul>';
if(empty($bm)){$bm=0;}
if($search[id]==='dy'){
	echo '<li style="float:left;"><a href="'.$jxjk.$search[urls][url][$bm].'" target="'.$target.'"  onclick="click_scroll();">第1集</a></li>';
}else{
	if($search[id]=='zy'){
	$play = html_data($search[urls][ly2][$bm],$search[id]);
		foreach($play['content'] as $k => $v) {
			echo '<li style="float:left;width:200px;"><a href="'.$jxjk.$v[url].'" target="'.$target.'"  onclick="click_scroll();">'.$v[name].'</a></li>';
		}		
	}else{
	$play = html_data($search[urls][ly2][$bm],$search[id]);
//	print_r($search[urls][ly2][$bm]);//打印输出
		foreach($play['content'] as $k => $v) {
			echo '<li style="float:left;"><a href="'.$jxjk.$v[url].'" target="'.$target.'" onclick="click_scroll();">第'.$v[name].'集</a></li>';
		}	
	}
}	
echo '</ul></div> <script type="text/javascript">
 function click_scroll() {
  document.getElementById("anchor_scroll").click();
 }
 </script><a id="anchor_scroll" href="#pos" style="display:none"></a><div class="clearfloat"></div>
<div  id="pos" align="center"><iframe width="100%" height="80%" frameborder="0" scrolling="no" name="myframe"></iframe><p style="background:black;"><a href="#mulu" style="color:red;background:#ADF3AD;">&#8593;&#8593;&#8593;&#8593;&#8593;向上滑动或点击返回剧集列表&#8593;&#8593;&#8593;&#8593;&#8593;<br>温馨提示：有时加载较慢，请耐心等待，如播放失败，请返回顶部切换线路或来源！</a></p></div>
<div class="clearfloat"></div>';
include ('./view/footer.php');
?>