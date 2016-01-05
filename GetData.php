<meta charset="UTF-8">
<?php
// The request also includes the userip parameter which provides the end
// user's IP address. Doing so will help distinguish this legitimate
// server-side traffic from traffic which doesn't come from an end-user.
$keyword = empty($_POST["keyword"])?"loveyou":urlencode($_POST["keyword"]);
$pagesize = $_POST["pagesize"]>0?$_POST["pagesize"]:4;
$currentpage = $_POST["currentpage"]>0?($_POST["currentpage"]-1)*$pagesize:0;

//$url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
//    . "q=".$kw."%20Hilton&userip=USERS-IP-ADDRESS";
$url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
    . "q=".$keyword."&userip=USERS-IP-ADDRESS&start=".$currentpage."&rsz=".$pagesize;
  $urlar   =   parse_url($_SESSION['HTTP_REFERER']); 
// sendRequest
// note how referer is set manually
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "http://http://www.luckyxue.com/"/* Enter the URL of your site here */);
$body = curl_exec($ch);
curl_close($ch);
echo  $body;
//return $body;
// now, process the JSON string
//$json = json_decode($body,true);
//var_dump($json);
// now have some fun with the results...
?>