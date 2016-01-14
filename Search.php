<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="CSS/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="Images/icon.png" />
    <title>EasyGoogle</title>

  </head>
  <body>
  <div class="g_head"></div>
    <div class="g_searchcontrol">
    
    <div><img class="g_logo" src="Images/logo.png"/></div>
    <div class="g_serchdiv"><input type="text" class="g_kwinput" id="keywords" name="keywords"/><input type="submit" class="g_submit" value="Google搜索"/></div>
    </div>
    <div class="g_bottom">
        <?php 
    require_once 'Template/footer.html';
    ?>
    </div>
  </body>
</html>