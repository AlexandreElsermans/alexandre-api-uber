<?php

require_once "models/chauffeurModel.php";

class ChauffeurController {
    private $model;

    public function __construct(){
        $this->model = new ChauffeurModel();
    }

    public function getAllChauffeurs(){
        $chauffeurs = $this->model->getDBAllChauffeurs();
        echo json_encode($chauffeurs);
    }

    public function getChauffeurById ($idChauffeur){
        $ligneChauffeur = $this->model->getDBChauffeurById($idChauffeur);
        echo json_encode($ligneChauffeur);
    }
}

//$chauffeurController = new ChauffeurController();
//$chauffeurController->getAllChauffeurs();

?>