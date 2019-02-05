<?php
header('Content-Type: application/json');
$postdata = file_get_contents("php://input");
$obj = json_decode($postdata);
$email = $obj->{'email'};
$senha =$obj->{'password'};

		header("HTTP/1.1 200 OK");
		// $token = 'NDc3NTEwOTA3MTg3MDM2MTgw.DzsuAg.KB01HjRHEguGlUd8omq5JYxVjks';
		// echo '{"token": "' . $token . '"}';
		$data = array("email" => $email, "password" => $senha);                                                                    
		$data_string = json_encode($data);                                                                                   

		$ch = curl_init('https://discordapp.com/api/v6/auth/consent-required');                                                                   
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);                                                                                                                   

		$answer  = curl_exec($ch);
		if($answer == '{"email": ["This field is required"], "password": ["This field is required"], "username": ["This field is required"]}'){
			header("HTTP/1.1 400 Bad Request");
			echo '{"email": ["This field is required"], "password": ["This field is required"], "username": ["This field is required"]}';
		}
		else{
		echo $answer;
		}

		if (curl_error($ch)) {
		    echo curl_error($ch);
		}

?>