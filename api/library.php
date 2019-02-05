<?php
header('Content-Type: application/json');     
$ch = curl_init('https://discordapp.com/api/v6/users/@me/library');

// Execute
curl_exec($ch);
$answer  = curl_exec($ch);
echo $answer;
?>