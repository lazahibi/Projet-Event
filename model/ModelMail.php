<?php

include_once('src/db/connect.php');
class ModelMail {

    private $connect;

    public function __construct() {
            $cnt = new connect;
            $this->connect = $cnt->setConnection();
        }

    public function readMail($id) {
      $req = $this->connect->prepare('SELECT id, name_ev, desc_ev, date_ev, address FROM event WHERE id=:value');
      $req->bindParam(':value', $id, PDO::PARAM_INT);
      $req->execute();
      $data = $req->fetch();
      $return = ['id' => $data['id'], 'name' => $data['name_ev'], 'desc' => $data['desc_ev'], 'date' => $data['date_ev'], 'address' => $data['address']];
      $req->closeCursor();
      return $return;
    }
}
