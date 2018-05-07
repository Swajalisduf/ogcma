<?php

require_once '../includes/src/app2.php';
if(!empty($_POST['password'])){
	//this stays on the checkCredentials page
	$user = [
		'username' => $_POST['username'],
		'password' => $_POST['password']
	];

	$login = new Login;
	$checkedCredentials = $login->checkLogin($user);
	$response = [];
	$response['redirect'] = filter_input(INPUT_POST, 'redirect', FILTER_SANITIZE_STRING);

	// var_dump($login->checkUsername($user['username']));
	// var_dump($login->checkPassword($user['username'], $user['password']));

	if($checkedCredentials){

	}
	switch($checkedCredentials){
		case(1):
			$response['status'] = 'true';
			break;
		case(2):
			$response['status'] = 'false';
			$response['error'] = '1';
			break;
		case(3):
			$response['status'] = 'false';
			$response['error'] = '2';
			break;
	}

	echo json_encode($response);

		
	//based on the above function I need to create the functions that return what is asked. aka checkPassword and the checkUsername
	//this would go in the Login Class
}