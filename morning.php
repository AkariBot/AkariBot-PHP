<?php
date_default_timezone_set('Asia/Tokyo');
require_once("mastodon.class.php");

$str = "";
$i = 0;

// 場所
$place[0] = "230010";
$place[1] = "270000";
$place[2] = "140010";
$place[3] = "130010";

while ($place[$i] !== null) {
    $file = file_get_contents("http://weather.livedoor.com/forecast/webservice/json/v1?city={$place[$i]}");
    if ($file == null) exit("NG:FILE_NULL");
    $file = mb_convert_encoding($file, 'UTF8', 'auto');
    $json = json_decode($file, true);
//変数チェック
    if ($json['forecasts'][0]['dateLabel'] == null) exit("NG:JSON_NULL");
    if ($json['forecasts'][0]['telop'] == null) $json['forecasts'][0]['telop'] = "不明";
    if ($json['forecasts'][0]['temperature']['min']['celsius'] == null) $json['forecasts'][0]['temperature']['min']['celsius'] = "--";
    if ($json['forecasts'][0]['temperature']['max']['celsius'] == null) $json['forecasts'][0]['temperature']['max']['celsius'] = "--";

//絵文字
    if ($json['forecasts'][0]['telop'] == "晴れ") $emoji = "☀";
    elseif ($json['forecasts'][0]['telop'] == "晴時々曇") $emoji = "⛅";
    elseif ($json['forecasts'][0]['telop'] == "雨") $emoji = "🌧";
    elseif ($json['forecasts'][0]['telop'] == "曇り") $emoji = "☁";
    else $emoji = "";

    $str .= "{$json['title']}: {$emoji} {$json['forecasts'][0]['telop']} 予想最高気温: {$json['forecasts'][0]['temperature']['max']['celsius']}℃\n";

    $i++;
}

$now_str = date('m月d日 H:i');
$cw_str = "おは南無～！！！ {$now_str} (JST)だよ！！！";

mastodon_post(array('status' => $str,'spoiler_text' => $cw_str));