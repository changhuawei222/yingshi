<?php
if(empty($_GET[cat])){$_GET[cat]='all';}
if(empty($_GET[area])){$_GET[area]='all';}
if(empty($_GET[year])){$_GET[year]='all';}
if(empty($_GET[page])){$_GET[page]='1';}
if(empty($_GET[id])){$_GET[id]='dianying';}
if(empty($_GET[act])){$_GET[act]='all';}
if(empty($_GET[rank])){$_GET[rank]='rankhot';}
$lists=array(
    'pd_numid' => array('dianying','dianshi','zongyi','dongman'),
    'pd_name' => array('电影','电视剧','综艺','动漫')
    );
 for($i=0;$i<count($lists["pd_numid"]);$i++){
	 $numclass = $lists["pd_numid"][$i]==$_GET[id]?" class='on'":"";
	 if(strlen($i)>0){
		  $pindao.= '<a href="http://'.$config['siteurl'].'/?id='.$lists["pd_numid"][$i].'" target="_self" '.$numclass.'>'.$lists["pd_name"][$i].'</a>';
     } 
 }

 for($i=0;$i<count($lists["pd_numid"]);$i++){
	 if($lists["pd_numid"][$i]==$_GET[id]){
		  $title.= $_GET[tag].$lists["pd_name"][$i];
     } 
 }
 if($_GET[page] > 1){$page = '第'.$_GET[page].'页';}
$config['bt']=str_replace('yk[key]',$title,$config['bt']);
$config['key']=str_replace('yk[key]',$title,$config['key']);
$config['ms']=str_replace('yk[key]',$title,$config['ms']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv=”Cache-Control” content=”no-transform” />
<meta http-equiv=”Cache-Control” content=”no-siteapp” />
<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title><?php echo $page.$config['bt'].' - '.$config['sitename'];?></title>
<meta name="keywords" content="<?php echo $config['key'];?>" />
<meta name="description" content="<?php echo $config['ms'];?>" />
<link href="./moban/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./moban/css2.css" />
<link rel="stylesheet" href="./moban/css1.css" />
</head><body>
<script type="text/javascript">
function nofind(){
if(top != self){
     location.href = "about:blank";
 }
var img=event.srcElement;
img.src="./moban/nocover.jpg";
img.onerror=null;
}
</script>
<div id="width" style="margin:auto;">
<div style="clear:both;"></div><br>
<div align="center"  style="font-weight:bold;margin:0px 5% 0px 5%;">支持：爱奇艺、乐视、腾讯、等VIP福利电影，电视剧在线观看。
</div></br>
<div align="center"><form action="index.php"  method="get"><input name="mode" type="hidden" value="search" /> <input type="text" placeholder="请输入影片的名称（或播放地址）" name="k" style="width:75%; height:35px;border-radius:5px;border:1px solid #ccc;"><input type="submit"  style="width:25%;height:35px;text-align:center;border:1px solid #aeaeae;border-radius:10px;text-align:center;color:#333; font-size:18px;" value="搜索"></form></div>
<div class="p-body"><div class="g-wrap"><div data-block="tj-filter" monitor-desc="筛选"><div class="b-listfilter">
<dl class="b-listfilter-item js-listfilter">
<dt class="type">频道:</dt>
<dd class="item g-clear js-listfilter-content"> 
 <?php echo $pindao;?>  
 </dd>        </dl>                
<?php
	$list = html_data($_GET[id]);
	foreach ($list["listtype"] as $n => $v) {
		echo '<dl class="b-listfilter-item js-listfilter">'.$list["listtype"][$n]['lx'].'<dd class="item g-clear js-listfilter-content">'.$list["listtype"][$n]['nr'].'</dd></dl>';
	}
	echo '</div><div class="b-listtab"></div>';
if(count($list['content'])>1){
$i = rand(1,6);
echo '<div class="b-listtab-main"><ul class="list g-clear">';
	foreach ($list["content"] as $k => $v) { 
		echo '<li class="item"><a href="http://'.$config['siteurl'].'/'.$v['url'].'" target="_blank"><div class="cover g-playicon"><img src="'.$v['img'].'" alt="'.$v['title'].'">'.$v['vip'].'<span class="hint">'.$v['ibg'].'</span></div> <div class="detail"><p class="title g-clear"><span class="s1">'.$v['title'].'</span><span class="s2"></span></p><p class="star">'.$v['view'].'</p></div></a> </li> ';	
	} 
	echo '</ul></div><div class="clearfloat"></div><div monitor-desc="分页" id="js-ew-page" data-block="js-ew-page"  class="ew-page">';
	echo $list["page"][0];	
}else{echo '<div align="center" style="font-weight:bold;font-size:20px;"><p>未找到内容！！</p></div>';} 
 echo '</div></div>';
include ('./view/footer.php');
?> 