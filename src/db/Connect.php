<?php
class Connect {
		const SERVERNAME = "localhost";
		const DBNAME = "seminaire";
		const DBUSER = "root";
		const DBPASS = "";

		public function setConnection() {
			try
		  	{
				$bdd = new PDO('mysql:host='.self::SERVERNAME.';dbname='.self::DBNAME.';charset=utf8',self::DBUSER,self::DBPASS);
				}

			catch (Exception $e)
				{
			     	die('Erreur : ' . $e->getMessage());
				}

			return $bdd;
		}
}
?>