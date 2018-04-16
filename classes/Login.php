<?php
class Login {
		public $connection;
		public function __construct() {
			$this->connection = Connect::init();
		}

		public function checkUsername($username){
			//check username
			if(!empty($username)){
				try{
					//SQL
					$selectUsername="
						SELECT username
						FROM users
						WHERE username = :username
						LIMIT 1";
					$statement = $this->connection->prepare($selectUsername);
					$statement->bindParam(':username', $username, PDO::PARAM_STR);
					$statement->execute();
					$response = $statement->fetch();
					return $response;
					//return true if exists
					
				} catch(exception $error){
					echo $error;
				}
			}
		}

		public function checkPassword($username){
			try {
				$selectOne="
					SELECT password
					FROM users
					WHERE username = :username
					LIMIT 1";
	
					$statement = $this->connection->prepare($selectOne);
					$statement->bindParam(':username', $username, PDO::PARAM_STR);
					$statement->execute();
					$password = $statement->fetch();
				
					return $password[0]; 
				} catch (expection $error) {
					echo $error->getMessage();
				}
		}

		public function checkLogin($user){
			if($this->checkUsername($user['username'])){
				if($this->checkPassword($user['username']) == $user['password']){
					return 1;
				} else {
					return 2; //"Password is incorrect."
				} 
			} else {
					return 3; //"Username({$user['username']}) does not exist."
			}
		}

		public function addCredentials($firstName, $lastName, $email, $username, $password, $securityQuestion, $securityAnswer){
			try{
				$addUser = "
				INSERT INTO users
							(first_name, last_name, email, username, password, securityQuestion, securityAnswer)
					VALUES	(:firstName, :lastName, :email, :username, :password, :securityQuestion, :securityAnswer)
				";
				$statement = $this->connection->prepare($addUser);
				$statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
				$statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
				$statement->bindParam(':email', $email, PDO::PARAM_STR);
				$statement->bindParam(':username', $username, PDO::PARAM_STR);
				$statement->bindParam(':password', $password, PDO::PARAM_STR);
				$statement->bindParam(':securityQuestion', $securityQuestion, PDO::PARAM_INT);
				$statement->bindParam(':securityAnswer', $securityAnswer, PDO::PARAM_STR);
				$statement->execute();
				$this->connection = null; //This closes the connection.
				return true;
			} catch (exception $error) {
					return $error->getMessage();
				}
		}


/* Fatal error: Using $this when not in object context in /home/michell4/ogcma.michellebluth.com/ogcma/ogcma-in-progress/classes/Login.php on line 67
 */}
//based on the above function I need to create the functions that return what is asked. aka checkPassword and the checkUsername
