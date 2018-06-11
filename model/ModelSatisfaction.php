<?php
include_once('src/db/connect.php');
class ModelSatisfaction {

    private $connect;

    public function __construct() {
            $cnt = new connect;
            $this->connect = $cnt->setConnection();
        }

    public function readFormSatisfaction($id) {
        $req = $this->connect->prepare('SELECT id, name_ev, nbr_atelier, logo, date_ev, address FROM event WHERE id=:value');
        $req->bindParam(':value', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $req->closeCursor();

        $req2 = $this->connect->prepare('SELECT id, name_atelier FROM atelier WHERE id_event=:value ORDER BY id');
        $req2->bindParam(':value', $id, PDO::PARAM_INT);
        $req2->execute();
        $data2 = $req2->fetchAll();
        $req2->closeCursor();

        $return = ['id' => $id, 'name' => $data['name_ev'], 'nbrAtelier' => $data['nbr_atelier'], 'logo' => $data['logo'], 'date' => $data['date_ev'], 'address' => $data['address'], 'req' => $data2];
        return $return;

       }

    public function sendFormSatisfaction($id) {
        for ($i=1; $i <= $_POST['nbrAtelier']; $i++) { 
                    $req = $this->connect->prepare('INSERT INTO satisfaction (id_atelier, id_event, note) VALUES (?, ?, ?)');
                    $req->execute(array($_POST['at'.$i], $id, $_POST['note'.$i],));
                    $req->closeCursor();
        }
        $req2 = $this->connect->prepare('INSERT INTO satisfaction (id_atelier, id_event, note) VALUES (?, ?, ?)');
        $req2->execute(array(0,  $id, $_POST['notegeneral'],));
        $req2->closeCursor();
    }
       

}