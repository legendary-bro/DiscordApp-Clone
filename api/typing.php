<?php
header('Content-Type: application/json');
$id = $_GET['channel'];
$url = 'http://discordapp.com/api/v6/channels/' . $id . '/messages?limit=50';
$ch = curl_init($url);

// Execute
curl_exec($ch);
$answer  = curl_exec($ch);
echo $answer;
?>