<?php

require_once "models/clientModel.php";

class ClientController {
    private $model;

    public function __construct(){
        $this->model = new ClientModel();
    }

    public function getAllClients(){
        $clients = $this->model->getDBAllClients();
        echo json_encode($clients);
    }

    public function getClientByID ($idClient) {
        $client = $this->model->getDBClientByID($idClient);
        echo json_encode($client);
    }

    public function createClient($dataClient){
        $ligneClient = $this->model->createDbClient($dataClient);
        http_response_code(201);
        echo json_encode($ligneClient);
    }
}

//$clientController = new ClientController();
//$clientController->getAllClients();

?>