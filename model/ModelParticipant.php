<?php
include_once('src/db/connect.php');
class ModelParticipant {

	private $connect;

	public function __construct() {
			$cnt = new connect;
			$this->connect = $cnt->setConnection();
		}

	public function read() {
		$info = array();
		$nbr = array();
		$req2 = $this->connect->query('SELECT id, name_ev FROM event ORDER BY id');
		$res = $this->connect->query('SELECT id, name_ev FROM event ORDER BY id');
		$i = 0;
		while ($data2 = $req2->fetch()) {

			$id = $data2['id'];
			$req = $this->connect->prepare('SELECT id, id_event, name, lastname, fonction, tel, mail, particip, dej, din, am, pm FROM participant WHERE id_event=:value');
			$req->bindParam(':value', $id, PDO::PARAM_INT);
			$req->execute();
			$j = 0;
			while ($data = $req->fetch()){
				$info[$i][$j] = $data;
				$j++;
			}

			$req->closeCursor();

			$req22 = $this->connect->prepare('SELECT COUNT(id) AS nbr FROM participant WHERE id_event=:value');
            $req22->bindParam(':value', $id, PDO::PARAM_INT);
            $req22->execute();

            $nbr[$i] =  $req22->fetch();

			$req22->closeCursor();
			$i++;
		}	
		$return = array("res" => $res, "info" => $info, "nbr" => $nbr);
		return $return;
	}


	public function readedit($edit) {

		$req = $this->connect->prepare('SELECT id, id_event, name, lastname, fonction, tel, mail, particip, dej, din, am, pm FROM participant WHERE id=:value');
		$req->bindParam(':value', $edit, PDO::PARAM_INT);
		$req->execute();
		$data = $req->fetch();
		$req2 = $this->connect->prepare('SELECT id, dej, din FROM event WHERE id=:value');
		$req2->bindParam(':value', $data['id_event'], PDO::PARAM_INT);
   	    $req2->execute();
		$data2 = $req2->fetch();
		$id = $data['id'];
		$name = $data['name'];
		$lastname = $data['lastname'];
		$fonction = $data['fonction'];
		$tel = $data['tel'];
		$mail = $data['mail'];
		$particip = $data['particip'];
		$dej = $data['dej'];
		$dej2 = $data2['dej'];
		$din = $data['din'];
		$din2 = $data['din'];
		$am = $data['am'];
		$pm = $data['pm'];
        $req->closeCursor();
        $return =  array("1" => $data, "2" => $data2);
        return $return;
	}

	public function update($update) {
		$req = $this->connect->prepare('UPDATE participant SET name = :n_name, lastname = :n_lastname, fonction = :n_fonction, tel = :n_tel, mail = :n_mail, particip = :n_particip, dej = :n_dej, din = :n_din, am = :n_am, pm = :n_pm WHERE id=:id');
		$req->bindParam(':id', $update, PDO::PARAM_INT);
		$req->execute(array(
			'id' => $update,
			':n_name' => strip_tags($_POST['name']),
			':n_lastname' => strip_tags($_POST['lastname']),
			':n_fonction' => strip_tags($_POST['fonction']),
			'n_tel' => strip_tags($_POST['tel']),
			'n_mail' => strip_tags($_POST['mail']),
			'n_particip' => strip_tags($_POST['particip']),
			'n_dej' => strip_tags($_POST['dej']),
			'n_din' => strip_tags($_POST['din']),
			'n_am' => strip_tags($_POST['dispoam']),
			'n_pm' => strip_tags($_POST['dispopm'])
		));
		$req->closeCursor();
	}

	public function delete($delete) {
		$req = $this->connect->prepare('DELETE FROM participant WHERE id=:value');
		$req->bindParam(':value', $delete, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();
	}
}