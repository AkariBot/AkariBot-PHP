<?php
require_once("../config.php");

function mastodon_post($data) {
    $ch = curl_init();
    $options = $data;
    curl_setopt($ch, CURLOPT_URL, "https://{$instance}". '/api/v1/statuses');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer {$token}"));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $options);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}