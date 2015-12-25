<?php
//$kw = $_POST["kw"];
//$url = "https://www.google.com.hk/?gws_rd=cr,ssl#newwindow=1&safe=strict&q=".$kw;
//$url = "https://www.baidu.com/s?wd=%E7%9A%84&rsv_bp=0&ch=&tn=baidu&bar=&rsv_spt=3&ie=utf-8&rsv_enter=1&inputT=970";
//echo htmlentities(access_url($url));
//echo curl_file_get_contents($url);




// 抓取网页URL
$url = 'http://www.google.com';
// 初始化，返回一个handler
$ch = curl_init($url);  
// 设置选项，有返回值
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 设置选项，来源页，这意味着可以伪造referer达到某种目的
curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.cn/');
// 设置选项，浏览器信息
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)');
// 执行
$raw = curl_exec($ch);curl_close($ch);  // 关闭handler
// 输出结果
echo $raw;




//echo  curl("https://www.google.com.hk/?gws_rd=cr,ssl#newwindow=1&safe=strict&q=dsfsafsf", "Mozilla 5.0");
  


 function curl($url, $user_agent, $retry=0){
    if($retry > 5){
        print "Maximum 5 retries are done, skipping!\n";
        return "in loop!";
    }

    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt ($ch, CURLOPT_HEADER, TRUE);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
   
    curl_setopt ($ch, CURLOPT_COOKIEFILE,"./cookie.txt");
    curl_setopt ($ch, CURLOPT_COOKIEJAR,"./cookie.txt");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);

    // handling the follow redirect
    if(preg_match("|Location: (https?://\S+)|", $result, $m)){
        print "Manually doing follow redirect!\n$m[1]\n";
        return curl($m[1], $user_agent, $retry + 1);
    }

    // add another condition here if the location is like Location: /home/products/index.php

    return $result;
}

function access_url($url) {
	if ($url=='') return false;
	$fp = fopen($url, 'r') or exit('Open url faild!');
	if($fp){
		while(!feof($fp)) {
			$file.=fgets($fp)."";
		}
		fclose($fp);
	}
	return $file;
}

function curl_file_get_contents($durl){  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $durl);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回    
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回    
    $r = curl_exec($ch);  
    curl_close($ch);  
    return $r;  
}  
?>