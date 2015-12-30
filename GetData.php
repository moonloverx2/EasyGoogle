<?php
// The request also includes the userip parameter which provides the end
// user's IP address. Doing so will help distinguish this legitimate
// server-side traffic from traffic which doesn't come from an end-user.
$url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
    . "q=石家庄%20Hilton&userip=USERS-IP-ADDRESS";

// sendRequest
// note how referer is set manually
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, "http://http://www.luckyxue.com/"/* Enter the URL of your site here */);
$body = curl_exec($ch);
curl_close($ch);
echo  $body;
// now, process the JSON string
$json = json_decode($body);

// now have some fun with the results...
?>