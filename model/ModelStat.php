<?php
include_once('src/db/connect.php');
class ModelStat {

    private $objCnx;

    public function __construct() {
            $cnx = new connect;
            $this->objCnx = $cnx->setConnection();
        }


    public function read() {
        $maxParticipant = array();
        $participant = array();
        $avg = array();
        $nbrNote = array();
        $nbrDej = array();
        $nbrDin = array();
        $req = $this->objCnx->query('SELECT id, name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, address, date_ev FROM event ORDER BY ID');
        $res = $this->objCnx->query('SELECT id, name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, address, date_ev FROM event ORDER BY ID');
        while ($data = $req->fetch())
        { 
            $id = $data['id'];
            $req2 = $this->objCnx->prepare('SELECT COUNT(id) AS nbr_max FROM participant WHERE id_event=:value');
            $req2->bindParam(':value', $id, PDO::PARAM_INT);
            $req2->execute();

            array_push($maxParticipant, $req2->fetch());

            $req2->closeCursor();

            $req22 = $this->objCnx->prepare('SELECT COUNT(id) AS nbr FROM participant WHERE id_event=:value AND participe = "oui"');
            $req22->bindParam(':value', $id, PDO::PARAM_INT);
            $req22->execute();

            array_push($participant, $req22->fetch());

            $req22->closeCursor();

            $req3 = $this->objCnx->prepare('SELECT AVG(note) AS note FROM satisfaction WHERE id_event=:value AND id_atelier=0');
            $req3->bindParam(':value', $id, PDO::PARAM_INT);
            $req3->execute();

            array_push($avg, $req3->fetch());

            $req3->closeCursor();

            $req4 = $this->objCnx->prepare('SELECT count(id) AS nbr_note FROM satisfaction WHERE id_event=:value AND id_atelier=0');
            $req4->bindParam(':value', $id, PDO::PARAM_INT);
            $req4->execute();

            array_push($nbrNote, $req4->fetch());

            $req4->closeCursor();

            $req5 = $this->objCnx->prepare("SELECT count(id) AS nbr_dej FROM participant WHERE id_event=:value AND dej = 'oui'");
            $req5->bindParam(':value', $id, PDO::PARAM_INT);
            $req5->execute();

            array_push($nbrDej, $req5->fetch());

            $req5->closeCursor();

            $req6 = $this->objCnx->prepare("SELECT count(id) AS nbr_din FROM participant WHERE id_event=:value AND din = 'oui'");
            $req6->bindParam(':value', $id, PDO::PARAM_INT);
            $req6->execute();

            array_push($nbrDin, $req6->fetch());

            $req6->closeCursor();


        }
        $return = array("res" => $res, "maxParticipant" => $maxParticipant, "participant" => $participant, "avg" => $avg, "nbrNote" => $nbrNote, "nbrDej" => $nbrDej, "nbrDin" => $nbrDin);
        return $return;
    }

}
?>