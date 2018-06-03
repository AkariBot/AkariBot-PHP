<?php
require_once("../lib/mastodon.class.php");

$str = "";
$file = file_get_contents("https://{$instance}/api/v1/instance/activity");
if (!$file) exit("NG:FILE_NULL");
$file = mb_convert_encoding($file, 'UTF8', 'auto');
$json = json_decode($file, true);

if ($json[0]["week"]) {
    $cw_str = "今週の{$instance}の統計！";
    $str .= "トゥート💬: {$json['0']['statuses']}トゥート\n​";
    $str .= "ログインユーザ👤: {$json['0']['logins']}人\n​";
    $str .= "​新規登録✨​: {$json['0']['registrations']}人​";

    mastodon_post(array('status' => $str,'spoiler_text' => $cw_str));
}