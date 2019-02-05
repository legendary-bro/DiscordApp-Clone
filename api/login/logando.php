<?php
header('Content-Type: application/json');
$postdata = file_get_contents("php://input");

$obj = json_decode($postdata);
$email = $obj->{'email'};
$senha =$obj->{'password'};

if(empty($email)){
	header("HTTP/1.1 400 Bad Request");
	echo '{"email": ["Este campo \u00e9 obrigat\u00f3rio"], "password": ["Este campo \u00e9 obrigat\u00f3rio"]}';
}
else{
	if(empty($email)){
		header("HTTP/1.1 400 Bad Request");
		echo '{"email": ["Este campo \u00e9 obrigat\u00f3rio"]}';
	}
	else if(empty($senha)){
		header("HTTP/1.1 400 Bad Request");
		echo '{"password": ["Este campo \u00e9 obrigat\u00f3rio"]}';
	}
	else if(isset($email) && isset($senha)){
		header("HTTP/1.1 400 Bad Request");
		echo '{"email": ["Tente novamente mais tarde"], "password": ["Tente novamente mais tarde"]}';
	}
}

?>