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

    public function updateChauffeur($id, $donnee) {
        $success = $this->model->updateDBChauffeur($id, $donnee);
        if ($success){
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Chauffeur non trouvé ou non modifié"]);
        }
    }

    public function deleteChauffeur($id) {
        $success = $this->model->deleteDBChauffeur($id);
        if ($success){
            http_response_code(204);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Chauffeur introuvable"]);
        }
    }
}

//$chauffeurController = new ChauffeurController();
//$chauffeurController->getAllChauffeurs();

?>