<meta charset="UTF-8">
<?php
$kw = $_POST["kw"];


function queryToUrl($query, $start=null, $perPage=100, $country="US") {
    return "http://www.google.com.hk/search?" . http_build_query(array(
        // Query
        "q"     => $query,
        // Country (geolocation presumably)
       // "gl"    => $country,
        // Start offset
        "start" => $start,
        // Number of result to a page
        "num"   => $perPage,
        "hl"=>"zh-cn"
    ), true);
}

// Find first 100 result for "pizza" in Canada
$ch = curl_init(queryToUrl($kw, 0, 15, "CA"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla 5.0");
curl_setopt($ch, CURLOPT_MAXREDIRS,      4);
curl_setopt($ch, CURLOPT_TIMEOUT,        5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($ch);

echo  $response;



?>