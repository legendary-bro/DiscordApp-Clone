<?php
header("HTTP/1.1 202 OK");
header('Content-Type: application/json');     
$ch = curl_init();
$url = 'https://discordapp.com/api/v6/activities';
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$agents = array(
	'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1',
	'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4',
	'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
	'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1'
 
);
curl_setopt($ch,CURLOPT_USERAGENT,$agents[array_rand($agents)]);
curl_setopt($ch, CURLOPT_URL, 'https://discordapp.com/api/v6/activities');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, 'https://discordapp.com');
curl_setopt($ch, CURLOPT_USERPWD, "myusername:mypassword");
// Execute
curl_exec($ch);
$answer  = curl_exec($ch);
echo $answer;
curl_close($ch);
?>