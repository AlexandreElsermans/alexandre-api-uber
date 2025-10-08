<?php

require_once "models/trajetModel.php";

class TrajetController {
    private $model;

    public function __construct(){
        $this->model = new TrajetModel();
    }

    public function getAllTrajets(){
        $trajets = $this->model->getDBAllTrajets();
        echo json_encode($trajets);
    }

    public function getTrajetByID ($idTrajet) {
        $trajet = $this->model->getDBTrajetByID($idTrajet);
        echo json_encode($trajet);
    }
}

//$trajetController = new TrajetController();
//$trajetController->getAllTrajets();

?>