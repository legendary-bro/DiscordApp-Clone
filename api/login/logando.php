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
		header("HTTP/1.1 200 OK");
		$token = 'NDc3NTEwOTA3MTg3MDM2MTgw.DzsuAg.KB01HjRHEguGlUd8omq5JYxVjks';
		echo '{"token": "' . $token . '"}';
		ini_set('display_errors', 1);
	    ini_set('display_startup_errors', 1);
	    error_reporting(E_ALL);
	    if (isset($_GET["error"])) {
	        echo json_encode(array("message" => "Authorization Error"));
	    } elseif (isset($_GET["code"])) {
	        $redirect_uri = "/";
	        $token_request = "https://discordapp.com/api/oauth2/token";
	        $token = curl_init();
	        curl_setopt_array($token, array(
	            CURLOPT_URL => $token_request,
	            CURLOPT_POST => 1,
	            CURLOPT_POSTFIELDS => array(
	                "grant_type" => "authorization_code",
	                "client_id" => "",
	                "client_secret" => "",
	                "redirect_uri" => $redirect_uri,
	                "code" => $_GET["code"]
	            )
	        ));
	        curl_setopt($token, CURLOPT_RETURNTRANSFER, true);
	        $resp = json_decode(curl_exec($token));
	        curl_close($token);
	        if (isset($resp->access_token)) {
	            $access_token = $resp->access_token;
	            $info_request = "https://discordapp.com/api/users/@me";
	            $info = curl_init();
	            curl_setopt_array($info, array(
	                CURLOPT_URL => $info_request,
	                CURLOPT_HTTPHEADER => array(
	                    "Authorization: Bearer {$access_token}"
	                ),
	                CURLOPT_RETURNTRANSFER => true
	            ));
	            $user = json_decode(curl_exec($info));
	            curl_close($info);
	            $token = $access_token;
				echo '{"token": "' . $token . '"}';
	        } else {
	            echo json_encode(array("message" => "Authentication Error"));
	        }
	    } else {
	        $error = 1;
	    }
	}
}

?>