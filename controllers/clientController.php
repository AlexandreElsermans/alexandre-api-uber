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
}

//$clientController = new ClientController();
//$clientController->getAllClients();

?>