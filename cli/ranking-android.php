<?php
/*
* using following api to get google play ranking.
* http://doroidpanic.com/ws/googleplay-ranking-api/
*/

function getTopGrossRankingAndroid () {
    $url = "http://doroidpanic.com/ws/googleplay-ranking-api/ranking/0";
    $json = file_get_contents($url);
    $res = json_decode($json, true);
    $resText = "";
    /*
    var_dump($res);
    switch (json_last_error()) {
    case JSON_ERROR_NONE:
        echo ' - No errors';
    break;
    case JSON_ERROR_DEPTH:
        echo ' - Maximum stack depth exceeded';
    break;
    case JSON_ERROR_STATE_MISMATCH:
        echo ' - Underflow or the modes mismatch';
    break;
    case JSON_ERROR_CTRL_CHAR:
        echo ' - Unexpected control character found';
    break;
    case JSON_ERROR_SYNTAX:
        echo ' - Syntax error, malformed JSON';
    break;
    case JSON_ERROR_UTF8:
        echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
    break;
    default:
        echo ' - Unknown error';
    break;
    }
    */
    //print_r($json);

    $cnt = 0;
    foreach ($res as $app) {
      $cnt++;
      $resText .= "【". $cnt . "】" . $app->title . PHP_EOL;
    }

    return $resText;
}

//print_r(getTopGrossRankingAndroid());
echo 'Ranking Android is Not supported now.';
