<?php 
$config['link']=explode('|||',$config['link']);
for($i=0;$i<count($config['link']);$i++){
	$config['link'][$i]=explode(',',$config['link'][$i]);
	$yqlj.=' <a href="'.$config['link'][$i][1].'" target="_blank">'.$config['link'][$i][0].'</a> ';
}
$foot=$config['tongji'].' 友情链接：'.$yqlj;
?>
<div class="clearfloat"></div>
<footer> 
    <p>Copyright &#169; 2016-2018 <a href="http://<?php echo $config['siteurl'];?>"><?php echo $config['sitename'];?></a> Inc. 保留所有权利。 <a href="http://www.miibeian.gov.cn/" rel="nofollow">豫ICP备14002871号</a><?php echo $foot;?></p>	
		<p>免责声明：本网站提供的影片均系来自网络索引，本网站只提供web页面测试服务，并不提供影片资源存储，若本站收录的节目无意侵犯了贵司版权，请发邮件到ahqueer@outlook.com，我们会及时处理和回复，谢谢！</P>
</footer></div>
<SCRIPT  LANGUAGE="JavaScript">  
function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}
function widdd() {
console.log(document.documentElement);var k=document.body.clientWidth;var s=window.screen.width;
if(k>s){k=s;}
k=k+15;
k=Math.floor(k/170);if(k<=2){k=2;}k=k*170-15;
document.getElementById("width").style.width=k+"px";
document.getElementById("wrap").style.width=k+"px";
}
widdd();
window.onresize=widdd;
</script>
</body>
</html>		 