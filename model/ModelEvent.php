<?php
include_once('src/db/connect.php');
class ModelEvent {

	private $connect;

	public function __construct() {
			$cnt = new connect;
			$this->connect = $cnt->setConnection();
		}

	public function create($namefile) {
		$req = $this->connect->prepare('INSERT INTO event (name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, address, date_ev) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$req->execute(array(strip_tags($_POST['name']), strip_tags($_POST['desc']), strip_tags($_POST['dej']), strip_tags($_POST['din']), strip_tags($_POST['lat']), strip_tags($_POST['lon']), strip_tags($_POST['nbr_atelier']), $namefile, strip_tags($_POST['address']), strip_tags($_POST['date'])));
		$req->closeCursor();

		$req1 = $this->connect->query('SELECT id FROM event ORDER BY id');
		while ($data = $req1->fetch()) { $id = $data['id'];}
		$req1->closeCursor();

		for ($i=1; $i <= $_POST['nbr_atelier']; $i++) { 
	  		$req2 = $this->connect->prepare('INSERT INTO atelier (id_event, name_atelier, desc_atelier) VALUES (?, ?, ?)');
			$req2->execute(array(($id), $_POST['name_atelier'. $i], $_POST['desc_atelier'. $i]));
			$req2->closeCursor();
		}
	}

	public function read() {
		$req = $this->connect->query('SELECT id, name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, address, date_ev FROM event ORDER BY ID');
		return $req;
	}

	public function readEdit($edit) {
		$req = $this->connect->prepare('SELECT id, name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, address, date_ev FROM event WHERE id=:value');
		$req->bindParam(':value', $edit, PDO::PARAM_INT);
		$req->execute();
		$req1 = $req->fetch();
		$req->closeCursor();

		$req2 = $this->connect->prepare('SELECT id, id_event, name_atelier, desc_atelier FROM atelier WHERE id_event=:value');
		$req2->bindParam(':value', $edit, PDO::PARAM_INT);
		$req2->execute();
		$req3 = $req2->fetchAll();
		$req2->closeCursor();
		$res = array("req1" => $req1, "req2" => $req3);
		return $res;
	}

	public function update($update, $namefile) {
		$req = $this->connect->prepare('UPDATE event SET name_ev = :n_name_ev, desc_ev = :n_desc_ev, dej = :n_dej, din = :n_din, lat = :n_lat, lon = :n_lon, nbr_atelier = :n_nbr_atelier, logo = :n_logo, address = :n_address, date_ev = :n_date_ev WHERE id=:id');
		$req->bindParam(':id', $update, PDO::PARAM_INT);
		$req->execute(array(
			'id' => strip_tags($update),
			'n_name_ev' => strip_tags($_POST['name']),
			'n_desc_ev' => strip_tags($_POST['desc']),
			'n_dej' => strip_tags($_POST['dej']),
			'n_din' => strip_tags($_POST['din']),
			'n_lat' => strip_tags($_POST['lat']),
			'n_lon' => strip_tags($_POST['lon']),
			'n_nbr_atelier' => strip_tags($_POST['nbr_atelier']),
			'n_logo' => $namefile,
			'n_address' => strip_tags($_POST['address']),
			'n_date_ev' => strip_tags($_POST['date'])
		));
		$req->closeCursor();

		$req1 = $this->connect->prepare('SELECT nbr_atelier FROM event WHERE id=:id');
		$req1->bindParam(':id', $update, PDO::PARAM_INT);
		$req1->execute();
		$data = $req1->fetch();
		$nbr_atelier = $data['nbr_atelier'];
		$req1->closeCursor();

		$req2 = $this->connect->prepare('DELETE FROM atelier WHERE id_event=:value');
		$req2->bindParam(':value', $update, PDO::PARAM_INT);
		$req2->execute();
		$req2->closeCursor();
		for ($i=1; $i <= $nbr_atelier; $i++) { 
			$req3 = $this->connect->prepare('INSERT INTO atelier (id_event, name_atelier, desc_atelier) VALUES (?, ?, ?)');
			$req3->execute(array(($update), $_POST['name_atelier'. $i], $_POST['desc_atelier'. $i]));
			$req3->closeCursor();
		}
	}

	public function delete($delete) {
		$req = $this->connect->prepare('DELETE FROM event WHERE id=:value');
		$req->bindParam(':value', $delete, PDO::PARAM_INT);
		$req->execute();
		$req->closeCursor();

		$req2 = $this->connect->prepare('DELETE FROM atelier WHERE id_event=:value');
		$req2->bindParam(':value', $delete, PDO::PARAM_INT);
		$req2->execute();
		$req2->closeCursor();
	}
}
?>