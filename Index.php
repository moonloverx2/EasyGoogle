<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Google,EasyGoogle,谷歌地址,能访问google" />
    <meta name="description" content="国内访问google,帮助大家访问google。http://google.luckyxue.com/。" />
    <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="Images/icon.png" />
    <title>EasyGoogle</title>
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
  <div class="g_head"></div>
    <div class="g_searchcontrol">
    
    <div><img class="g_logo" src="Images/logo.png"/></div>
    <form action="Search.php" method="get" onsubmit="return check()">
    <div class="g_serchdiv">
    <input type="text" class="g_kwinput" id="key" name="key"/>
    <input type="hidden" class="g_kwinput" id="keyword" name="keyword"/>
    <input type="submit" class="g_submit" value="Google搜索"/>
    </div>
    </form>
    </div>
    <div class="g_bottom">
        <?php
    require_once 'Template/footer.html';
    ?>
    </div>
  </body>
</html>

<?php

if(!empty($_COOKIE['host']))
{
    //echo  $_COOKIE['host'];
}
else
{
    setcookie("host","luckyxue.com");
}
?>

