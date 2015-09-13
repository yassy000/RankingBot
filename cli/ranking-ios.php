<?php

function getTopGrossRankingIos () {
    $url = "https://itunes.apple.com/jp/rss/topgrossingapplications/limit=50/xml";
    $res = simplexml_load_file($url);
    $resText = "";

    //var_dump($res);
    $cnt = 0;
    foreach ($res->entry as $app) {
      $cnt++;
      $resText .= "【". $cnt . "】" . $app->title . PHP_EOL;
    }

    return $resText;
}

print_r(getTopGrossRankingIos());
