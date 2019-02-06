<?php
header('Content-Type: application/json');
$postdata = file_get_contents("php://input");
$obj = json_decode($postdata);
$email = $obj->{'email'};
$senha =$obj->{'password'};
$username =$obj->{'username'};
$captcha_key = $obj->{'captcha_key'};

		header("HTTP/1.1 200 OK");
		// $token = 'NDc3NTEwOTA3MTg3MDM2MTgw.DzsuAg.KB01HjRHEguGlUd8omq5JYxVjks';
		// echo '{"token": "' . $token . '"}';
		$data = array("email" => $email, "password" => $senha, "username" => $username,"captcha_key" => $captcha_key);                                                                    
		$data_string = json_encode($data);                                                                                   

		$ch = curl_init('https://discordapp.com/api/v6/auth/register');                                                                     
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);                                                                                                                   
		header("HTTP/1.1 400 Bad Request");
		$answer  = curl_exec($ch);
		if($answer == '{"email": ["This field is required"], "password": ["This field is required"], "username": ["This field is required"]}'){
			echo '{"email": ["This field is required"], "password": ["This field is required"], "username": ["This field is required"]}';
		}
		else if($answer == '{"password": ["This field is required"], "username": ["This field is required"]}'){
			echo '{"password": ["This field is required"], "username": ["This field is required"]}';
		}
		else if($answer == '{"password": ["This field is required"]}'){
			echo '{"password": ["This field is required"]}';
		}
		else if($answer == '{"password": ["Must be between 6 and 128 in length."]}'){
			echo '{"password": ["Must be between 6 and 128 in length."]}';
		}
		else if($answer == '{"email": ["Email is already registered."]}'){
			echo '{"email": ["Email is already registered."]}';
		}
		else if($answer == '{
  "global": false, 
  "message": "You are being rate limited.", 
  "retry_after": 26951
}
'){
			echo '{
  "global": false, 
  "message": "You are being rate limited.", 
  "retry_after": 26951
}
';
		}
		else if($answer == '{"captcha_key": ["captcha-required"]}'){
			echo '{"captcha_key": ["captcha-required"]}';
		}
		else{
		header("HTTP/1.1 200 Ok");
		echo $answer;
		}

		if (curl_error($ch)) {
		    echo curl_error($ch);
		}

?>