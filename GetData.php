<meta charset="UTF-8">
<?php
// The request also includes the userip parameter which provides the end
// user's IP address. Doing so will help distinguish this legitimate
// server-side traffic from traffic which doesn't come from an end-user.
$kw = $_POST["kw"];
//$url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
//    . "q=".$kw."%20Hilton&userip=USERS-IP-ADDRESS";
$url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
    . "q=".$kw."&userip=USERS-IP-ADDRESS";

// sendRequest
// note how referer is set manually
$ch = curl_init();
//$this_header = array(
//"content-type: application/x-www-form-urlencoded; 
//charset=UTF-8"
//);
//
//curl_setopt($ch,CURLOPT_HTTPHEADER,$this_header);
//curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "http://http://www.luckyxue.com/"/* Enter the URL of your site here */);
$body = curl_exec($ch);
curl_close($ch);
echo  $url."\n";
echo  $body;
// now, process the JSON string
$json = json_decode($body);
//var_dump($json);
// now have some fun with the results...
?>