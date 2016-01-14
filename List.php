<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="Images/icon.png" />
    <title>关键字</title>

  </head>
  <body>
  <div class="l_head">
  <img class="l_logo" src="Images/logo.png"/>
  <div class="l_serchdiv">
  <input type="text" class="l_kwinput" id="keywords" name="keywords"/>
  <input type="submit" class="g_submit" value="Google搜索"/>
  </div>
  </div>
    <div class="l_result">
    
    <div class="l_left">
    
    <?php 
    require 'Helper.php';

	$de = getArray (urlencode("手机"),0,8);
    $count = count($de['responseData']['results']);
?>
    <div class="r_count">
         找到约 <?php echo $de['responseData']['cursor']['resultCount'];?> 条结果 （用时 <?php echo $de['responseData']['cursor']['searchResultTime'];?> 秒）
    </div>
<?php 
        for ($i =0;$i<$count;$i++){
        	echo "<div class=\"r_content\">";
	        echo "<span class=\"r_title\"><a target=\"blank\" href=\"".urldecode($de['responseData']['results'][$i]['url'])."\" title=\"".$de['responseData']['results'][$i]['titleNoFormatting']."\">".strip_tags($de['responseData']['results'][$i]['title'])."</a></span>";
	        echo "<div class=\"r_url\">".$de['responseData']['results'][$i]['url']."</div>";
	        echo "<div>".$de['responseData']['results'][$i]['content']."</div>";
	        
	        echo "</div>";
        }
	
	?>
<div class="f_page">1\2\3\4\5</div> 
    </div>
    
    <div class="l_right"></div> 
      
    </div>
    <div class="l_bottom">
    <?php 
    require_once 'Template/footer.html';
    ?>
    </div>
  </body>
</html>