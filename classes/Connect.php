<?php
class Connect {
	private static $connection;
				
	public static function init() {
		# For use with BYU Server
		// $database = "ogcma";
		// $username = "ogcma_user";
		// $password = "0xford1O!";	
		// $hostname = "humdbinternal.byu.edu";

		# For development purpose
		$database = "ogcma-dev";
		$username = "root";
		$password = null;
		$hostname = "127.0.0.1";

		self::$connection = new PDO(
			"mysql:host={$hostname};dbname={$database}",
			$username,
			$password
		);
		self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return self::$connection;
	} //end init
} // end Connect
