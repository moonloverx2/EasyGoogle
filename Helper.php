<?php


	function  getJson($keyword,$currentpage,$pagesize)
	{
		$url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".$keyword."&userip=USERS-IP-ADDRESS&start=".$currentpage."&rsz=".$pagesize;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, "http://http://www.luckyxue.com/"/* Enter the URL of your site here */);
        $body = curl_exec($ch);
        curl_close($ch);
        return $body;
	}
	
	function getArray($keyword,$currentpage,$pagesize)
	{
		return json_decode(getJson($keyword,$currentpage,$pagesize),true); 
	}



?>