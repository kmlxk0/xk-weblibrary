<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站建设-云南网站建设服务昆明德信科技</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="keywords" content="">
<meta name="DESCRIPTION" content="">
<link href="favicon.ico" rel="shortcut icon" />
<link type="text/css" rel="stylesheet" href="templet/css/index.css"/>
<link type="text/css" rel="stylesheet" href="templet/css/style.css"/>
<link rel="stylesheet" type="text/css" href="templet/css/example.css"/>
<script>
window.onerror = killErrors;
function killErrors() {
   return true;
}</script>
<script language="JavaScript" src="templet/js/config.js"></script>
<script language="JavaScript" src="templet/js/jquery.min.js"></script>
<script language="JavaScript" src="templet/js/common.js"></script>
<script type="text/javascript" src="templet/js/jqModal.js"></script>
</head><body>
<div id="head">
  <div class="head_content">
    <div class="logo"><a href="index.html"><img src="templet/images/logo.png" /></a></div>
    <div class="user_login">　<a href="About/Contact.html">联系我们</a> |　<a href="plus/tags.asp">Tags</a><br /><div class="search">
        <form name="searchform" action="/plus/search/" method="get">
          <input class="txt" type="text" size="26"  name="key" id="key" />
          <input type="hidden" name="stype" value="2"/>
          <input type=hidden name="m" id="m" value="1">
          <label>
            <input class="search_pic" type="submit" value="" name="dosubmit"/>
          </label>
        </form>
      </div>
    </div>
  </div>
</div><div id="menu_bg"><div class="menu">  <li><a  href="index.html">网站首页</a></li>  <li class="currclass"><a  href="index.html">网站建设</a></li>  <li><a  href="wangzhgaiban/index.html">网站改版</a></li>  <li><a  href="case/index.html">客户案例</a></li>  <li><a  href="Maintenance/index.html">托管维护</a></li>  <li><a  href="shiyonggongju/index.html">实用工具</a></li>  <li><a  href="practical/index.html">实用教程</a></li>  <li><a  href="design/index.html">设计欣赏</a></li><li style="width:10px;"></li></div></div>
<div id="main">
  <div class="content">
    <div id="position">
        我的位置：<a href="index.html">昆明德信科技</a>
        <a href="<?php echo h(url('webcompany/tag', array('id'=>$tag->id())));?>">标签 <?php echo $tag->text;?></a>
        
    </div>
    <div class="blank15"></div>
    <div class="right w664">
      <div class="r_t"></div>
      <div class="r_c">
        <div class="aboutus">
          <ul class="text_list">
            <div class="entry">
<?php
$tpl = <<<EOT
<div class="entry-title">
<h2><a href="%s">%s</a></h2>
</div>
<p>%s</p>
EOT;
    foreach ($items as $item) {
        printf($tpl, 
                h(url('webcompany/view', array('id'=>$item->id()))),
                $item->title,
                html_abstract($item->content, 0, 100));
    }
?>

            </div>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
      <div class="r_b"></div>
    </div>
    <div class="left_box">
      <div class="item_box">
        <div class="bg_t"></div>
        <div class="bg_c">
  <h4>建网站最关心的几个问题</h4>
  <div id="pngbox" class="bg_bg">
    <ul  class="item">
      <li><a href="Quotation.html">网站制作报价</a></li>
      <li><a href="Combination.html">优惠建站套餐</a></li>
      <li><a href="Client/Multimedial.html">我们的案例</a></li>
      <li><a href="Flowchart.html">网站建设流程</a></li>
      <li><a href="Maintenance/Renewal.html">我的网站要改版</a></li>
      <li><a href="About/Superiority.html">我们的优势是什么？</a></li>    </ul>
  </div>
</div>
        <div class="bg_b"></div>
      </div><div id="tagCloud" class="tagCloud"> <a href="plus/tag.asp-n=SEO" target="_blank" title="TAG:SEO&#10;被搜索了577272次">SEO</a> <a href="plus/tag.asp-n=建站工作室" target="_blank" title="TAG:建站工作室&#10;被搜索了416876次">建站工作室</a> <a href="plus/tag.asp-n=网站" target="_blank" title="TAG:网站&#10;被搜索了379580次">网站</a> <a href="plus/tag.asp-n=意义" target="_blank" title="TAG:意义&#10;被搜索了306820次">意义</a> <a href="plus/tag.asp-n=设计" target="_blank" title="TAG:设计&#10;被搜索了282663次">设计</a> <a href="plus/tag.asp-n=方案" target="_blank" title="TAG:方案&#10;被搜索了210772次">方案</a> <a href="plus/tag.asp-n=网站建设" target="_blank" title="TAG:网站建设&#10;被搜索了205254次">网站建设</a> <a href="plus/tag.asp-n=为什么" target="_blank" title="TAG:为什么&#10;被搜索了190341次">为什么</a> <a href="plus/tag.asp-n=企业" target="_blank" title="TAG:企业&#10;被搜索了186765次">企业</a> <a href="plus/tag.asp-n=如何" target="_blank" title="TAG:如何&#10;被搜索了184535次">如何</a> </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div id="qq"><a target="_blank" href="wpa.qq.com/msgrd-v=3&uin=2948919713&site=qq&menu=yes"><img border="0" src="wpa.qq.com/pa-p=2-2948919713-42" alt="网站建设咨询" title="点击这里给我发消息"></a></div><div id="footer">
<div class="content"> 地址：昆明市北辰北环路北辰小区桂花苑34-3-301 邮编：650000　电话：0871-65739266 　手机：13648831972（24h） <br />
  QQ：2948919713    　　2948919713@qq.com <br />
  &copy;  2004-2013 www.web871.com 昆明德信科技. 版权所有 <A href="www.miibeian.gov.cn/index.html" target="_blank">滇ICP备09060998 </A><script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2542fd3aa86b683525b1726cd260fe80' type='text/javascript'%3E%3C/script%3E"));
</script>
  <script src="s13.cnzz.com/stat.php-id=760326&web_id=760326" language="JavaScript"></script>
</div>
</div><!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=2&amp;pos=left&amp;uid=6565627" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
var bds_config={"bdTop":244};

</script>
<!-- Baidu Button END -->
</body>
</html>
<script src="ks_inc/ajax.js" type="text/javascript"></script>
