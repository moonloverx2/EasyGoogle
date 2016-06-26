    <?php 
    require 'Helper.php';
    $keyword = empty($_GET["keyword"])?"EasyGoogle":base64_decode(urlencode($_GET["keyword"]));
    //$pagesize = $_POST["pagesize"]>0?$_POST["pagesize"]:8;
    $pagesize = 8;
    $currentpage = $_GET["currentpage"]>0?($_GET["currentpage"]-1):0;
	 $de = getArray ($keyword,$currentpage*$pagesize,$pagesize);
    $count = count($de['responseData']['results']);
    
   if(!empty($_COOKIE['host']))
   {
	//echo  $_COOKIE['host'];

   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Google,EasyGoogle,谷歌地址,能访问google" />
    <meta name="description" content="国内访问google,帮助大家访问google。http://google.luckyxue.com/。" />
    <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    <script src="jquery-1.9.1.min.js"></script>
    <script >
       $(function(){
              $("#<?php echo $currentpage+1;?>").css("color","black"); 
           });
    </script>
    <link rel="shortcut icon" type="image/x-icon" href="Images/icon.png" />
    <title><?php echo urldecode($keyword);?>_EasyGoogle</title>
    <script type="text/javascript" src="Js/Base64.js"></script>
    <script type="text/javascript" src="Js/jquery.1.7.2.js"></script>
    <script>

    function check()
     {
        var b = new Base64();  
        var str = b.encode($("#key").val());  
        alert(str);
        $("#keyword").val(str);
        return true;
        }
    
    </script>
  </head>
  <body>
  <div class="l_head">
  <a href="/"><img class="l_logo" src="Images/logo_l.png"/></a>
  <form action="Search.php" method="get" onsubmit="return check()">
  <div class="l_serchdiv">
  <input type="text" class="l_kwinput" id="key" name="key" value="<?php echo urldecode($keyword);?>"/>
    <input type="hidden" class="g_kwinput" id="keyword" name="keyword"/>
  <input type="submit" class="g_submit" value="Google搜索"/>
  </div>
  </form>
  </div>
    <div class="l_result">
    
    <div class="l_left">
    

    <div class="r_count">
         找到约 <?php echo $de['responseData']['cursor']['resultCount'];?> 条结果 （用时 <?php echo $de['responseData']['cursor']['searchResultTime'];?> 秒）
    </div>
<?php 
        for ($i =0;$i<$count;$i++){
           echo "<div class=\"r_content\">";
	        echo "<span class=\"r_title\"><a target=\"blank\" href=\"".urldecode($de['responseData']['results'][$i]['url'])."\" title=\"".$de['responseData']['results'][$i]['titleNoFormatting']."\">".strip_tags($de['responseData']['results'][$i]['title'])."</a></span>";
	        echo "<div class=\"r_url\">".urldecode($de['responseData']['results'][$i]['url'])."</div>";
	        echo "<div>".$de['responseData']['results'][$i]['content']."</div>";
	        
	        echo "</div>";
        }
	
	?>
  <div class="f_page">
  <table class="f_table">
  <tr>
  <?php 

  for($k=1;$k<9;$k++)
  {
  	echo "<td ><a id=".$k." href=\"Search.php?keyword=".$keyword."&currentpage=".$k."\">".$k."</a></td>";
  }
  ?>
<!--   <td class="f_chosed">1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td> -->
  </tr>
  </table>
  </div> 
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
   <?php 
   }
   else 
   {
	 setcookie("host","luckyxue.com");
	 echo "404";
   }
?>