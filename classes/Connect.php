<?php
class Connect {
	private static $connection;
				
	public static function init() {
		$database = "ogcma";
		$username = "ogcma_user";
		$password = "0xford1O!";	
		$hostname = "humdbinternal.byu.edu";
		self::$connection = new PDO(
			"mysql:host={$hostname};dbname={$database}",
			$username,
			$password
		);
		self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return self::$connection;
	} //end init
} // end Connect
