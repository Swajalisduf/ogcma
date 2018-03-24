<?php
	include '../includes/src/app2.php';
	
	$login = new Login;

	if(!empty($_POST)){
		$firstName = trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
		$lastName = trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING));
		$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
		$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
		$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
		$securityQuestion = trim(filter_input(INPUT_POST, 'securityQuestion', FILTER_SANITIZE_NUMBER_INT));
		$securityAnswer = trim(filter_input(INPUT_POST, 'securityAnswer', FILTER_SANITIZE_STRING));
		$response = $login->addCredentials(
			$firstName,
			$lastName,
			$email,
			$username,
			$password,
			$securityQuestion,
			$securityAnswer
		);
		
		$json = [];
		
		if($response == true){
			$json = [
				'status' => 'true'
			];
			echo json_encode($json);
		} else {
			$json = [
				'status' => 'false',
				'error' => $response
			];
			echo json_encode($json);
		}
	}
	//if addCredentials returns true return Json array so that the Javascript can send user to the admin page
	