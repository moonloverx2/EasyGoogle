 <meta charset="UTF-8">
 <?php
	$postArray = '[{"data":{"hello":"world"},
			"type":"1234",
			"date":"2012-10-30 17:6:9",
			"user":"000000000000000",
			"time_stamp":1351587969902},
	       {"data":{"hello":"world"},
			"type":"1234",
			"date":"2012-10-30 17:12:53",
			"user":"000000000000000",
			"time_stamp":1351588373519}]';
	
	$test = '{
    "responseData": {
        "results": [
            {
                "GsearchResultClass": "GwebSearch",
                "unescapedUrl": "https://zh.wikipedia.org/zh/%E7%9F%B3%E5%AE%B6%E5%BA%84%E5%B8%82",
                "url": "https://zh.wikipedia.org/zh/%25E7%259F%25B3%25E5%25AE%25B6%25E5%25BA%2584%25E5%25B8%2582",
                "visibleUrl": "zh.wikipedia.org",
                "cacheUrl": "http://www.google.com/search?q=cache:tmipwJ89KbMJ:zh.wikipedia.org",
                "title": "<b>石家庄</b>市- 维基百科，自由的百科全书",
                "titleNoFormatting": "石家庄市- 维基百科，自由的百科全书",
                "content": "<b>石家庄</b>市（汉语拼音：Shíjiāzhuāng shì，邮政式拼音：Shihkiachwang），简称石，舊稱\n石門，是中华人民共和国河北省的省会，京津冀区域的中心城市，全国重要的现代 ..."
            },
            {
                "GsearchResultClass": "GwebSearch",
                "unescapedUrl": "http://baike.baidu.com/view/4187.htm",
                "url": "http://baike.baidu.com/view/4187.htm",
                "visibleUrl": "baike.baidu.com",
                "cacheUrl": "http://www.google.com/search?q=cache:S-5kvNYZ-voJ:baike.baidu.com",
                "title": "<b>石家庄</b>（<b>石家庄</b>）_百度百科",
                "titleNoFormatting": "石家庄（石家庄）_百度百科",
                "content": "<b>石家庄</b>：河北省会<b>石家庄</b>：山西省宁武县<b>石家庄</b>镇<b>石家庄</b>：河北省<b>石家庄</b>市鹿泉区\n<b>石家庄</b>村..."
            },
            {
                "GsearchResultClass": "GwebSearch",
                "unescapedUrl": "http://www.mafengwo.cn/travel-scenic-spot/mafengwo/11830.html",
                "url": "http://www.mafengwo.cn/travel-scenic-spot/mafengwo/11830.html",
                "visibleUrl": "www.mafengwo.cn",
                "cacheUrl": "http://www.google.com/search?q=cache:Rr17iNI8UnsJ:www.mafengwo.cn",
                "title": "2016<b>石家庄</b>旅游攻略,<b>石家庄</b>自由行攻略,蚂蜂窝<b>石家庄</b>出游攻略游记 <b>...</b>",
                "titleNoFormatting": "2016石家庄旅游攻略,石家庄自由行攻略,蚂蜂窝石家庄出游攻略游记 ...",
                "content": "2016<b>石家庄</b>旅游攻略,介绍了<b>石家庄</b>旅游景点、线路、美食、住宿、地图等<b>石家庄</b>旅游\n攻略信息,了解<b>石家庄</b>旅游等自由行攻略信息来蚂蜂窝旅游攻略网。"
            }
        ],
        "cursor": {
            "resultCount": "12,400,000",
            "pages": [
                {
                    "start": "0",
                    "label": 1
                },
                {
                    "start": "3",
                    "label": 2
                },
                {
                    "start": "6",
                    "label": 3
                },
                {
                    "start": "9",
                    "label": 4
                },
                {
                    "start": "12",
                    "label": 5
                },
                {
                    "start": "15",
                    "label": 6
                },
                {
                    "start": "18",
                    "label": 7
                },
                {
                    "start": "21",
                    "label": 8
                }
            ],
            "estimatedResultCount": "12400000",
            "currentPageIndex": 0,
            "moreResultsUrl": "http://www.google.com/search?oe=utf8&ie=utf8&source=uds&start=0&hl=en&q=%E7%9F%B3%E5%AE%B6%E5%BA%84",
            "searchResultTime": "0.17"
        }
    },
    "responseDetails": null,
    "responseStatus": 200
}';
	
// $de_json = json_decode ( $postArray, TRUE );
// 	$count_json = count ( $de_json );
// 	for($i = 0; $i < $count_json; $i ++) {
// 		// echo var_dump($de_json);
		
// 		echo $de_json [$i] ['date'];echo '<br />';
// 		echo $de_json [$i] ['type'];echo '<br />';
// 		echo $de_json [$i] ['user'];echo '<br />';
// 		echo json_encode ( $de_json [$i] ['data'] );echo '<br />';
// 	}
	require 'Helper.php';
    $keyword = empty($_POST["keyword"])?"loveyou":urlencode($_POST["keyword"]);
    $pagesize = $_POST["pagesize"]>0?$_POST["pagesize"]:4;
    $currentpage = $_POST["currentpage"]>0?($_POST["currentpage"]-1)*$pagesize:0;
	$de = getArray ($keyword,$currentpage,$pagesize);
	//$de = json_decode($test,true); ;
	echo $de;
	$count = count ( $de['responseData']['results'] );
	echo "大数组长度为".$count;echo '<br />';
    echo "搜索结果数组长度为".count($de['responseData']['results']);echo '<br />';
       
		echo $de['responseData'];echo '<br />';
		echo $de['responseData']['results'][0]['title'];echo '<br />';
		echo $de['responseStatus'];echo '<br />';
        for ($i =0;$i<$count;$i++){
	        echo "<a target=\"blank\" href=\"".urldecode($de['responseData']['results'][$i]['url'])."\" title=\"".$de['responseData']['results'][$i]['titleNoFormatting']."\">".$de['responseData']['results'][$i]['title']."</a>";echo '<br />';
	        echo $de['responseData']['results'][$i]['content'];echo '<br />';
	        echo $de['responseData']['results'][$i]['visibleUrl'];echo '<br />';echo '<br />';echo '<br />';
        }
	
	?>
	