<?php

class ClientModel {
    private $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=bruno_uber;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    
    public function getDBAllClients()
    {
        $stmt = $this->pdo->query("SELECT * FROM Client");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBClientByID ($idClient) {
        $stmt = $this->pdo->prepare("SELECT * FROM Client WHERE client_id = :idClient");
        $stmt->bindValue(":idClient", $idClient, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createDbClient($dataClient){
        $requete = "INSERT INTO client (client_id, client_nom, client_telephone)
        VALUE (:id, :nom, :tel);
        ";
        $stmt = $this->pdo->prepare($requete);
        $stmt->bindParam(":id", $dataClient["client_id"], PDO::PARAM_INT);
        $stmt->bindParam(":nom", $dataClient["client_nom"], PDO::PARAM_STR);
        $stmt->bindParam(":tel", $dataClient["client_telephone"], PDO::PARAM_STR);
        $stmt->execute();

        return $this->getDBClientByID($dataClient["client_id"]);
    }
}

//$client1 = new ClientModel();
//print_r($client1->getDBAllClients());

?>