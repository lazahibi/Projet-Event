<?php

include_once('src/db/connect.php');
class Admin {

    private $connect;

    public function __construct() {
            $cnt = new connect;
            $this->connect = $cnt->setConnection();
        }

    public function calendar() {
        $req = $this->connect->query('SELECT id, name_ev, date_ev FROM event ORDER BY ID');
        return $req;
    }

    public function nextEv() {
       $req = $this->connect->query('SELECT id, name_ev, date_ev FROM event WHERE date_ev > CURRENT_DATE ORDER BY date_ev ASC LIMIT 1');
       $data = $req->fetch();
       $id = $data['id'];
       $req2 = $this->connect->query("SELECT COUNT(id) as nbr_participant FROM participant WHERE id_event = '$id' AND particip = 'oui'");
       $data2 = $req2->fetch();
       $particip = $data2['nbr_participant'];
       $nextEv = $data['name_ev'];
       $dateEv = $data['date_ev'];


       
       $res = ['dateEv' => $dateEv, 'nextEv' => $nextEv, 'particip' => $particip];
       return $res;
    }
}
