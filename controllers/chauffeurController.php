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

    public function getAllChVo(){
        $ChVos = $this->model->getDBAllChVo();
        echo json_encode($ChVos);
    }

    public function getChVoByID ($idChauffeur) {
        $ChVo = $this->model->getDBChVoByID($idChauffeur);
        echo json_encode($ChVo);
    }

    public function createChauffeur($dataChauffeur){
        $ligneChauffeur = $this->model->createDBChauffeur($dataChauffeur);
        http_response_code(201);
        echo json_encode($ligneChauffeur);
    }
}

//$chauffeurController = new ChauffeurController();
//$chauffeurController->getAllChauffeurs();

?>