<?php

require_once "models/voitureModel.php";

class VoitureController {
    private $model;

    public function __construct(){
        $this->model = new VoitureModel();
    }

    public function getAllVoitures(){
        $voitures = $this->model->getDBAllVoitures();
        echo json_encode($voitures);
    }

    public function getVoitureByID ($idVoiture) {
        $voiture = $this->model->getDBVoitureByID($idVoiture);
        echo json_encode($voiture);
    }
}

//$voitureController = new VoitureController();
//$voitureController->getAllVoitures();

?>