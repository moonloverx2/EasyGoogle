<meta charset="UTF-8">
<?php

require 'Helper.php';
$keyword = empty($_POST["keyword"])?"loveyou":urlencode($_POST["keyword"]);
$pagesize = $_POST["pagesize"]>0?$_POST["pagesize"]:8;
$currentpage = $_POST["currentpage"]>0?($_POST["currentpage"]-1)*$pagesize:0;

echo getJson($keyword,$currentpage,$pagesize);

?>