<?php
include_once('src/db/connect.php');
class ModelLogin {
	private $connect;


	public function __construct() {
			$cnt = new connect;
			$this->connect = $cnt->setConnection();
		}

	public function login($usr, $pswd){
		$psd = md5($pswd);
		$req = $this->connect->prepare('SELECT id FROM admin WHERE usr=:usr AND pswd=:pswd');
		$req->bindParam(':usr', $usr, PDO::PARAM_STR);
		$req->bindParam(':pswd', $psd, PDO::PARAM_STR);
		$req->execute();
		$data = $req->fetch();
		return $data['id'];
	}
}