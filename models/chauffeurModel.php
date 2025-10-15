<?php

class ChauffeurModel {
    private $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=bruno_uber;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    
    public function getDBAllChauffeurs()
    {
        $stmt = $this->pdo->query("SELECT * FROM Chauffeur");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBChauffeurById($idChauffeur) {
        $stmt = $this->pdo->prepare("SELECT * FROM chauffeur WHERE chauffeur_id = :idChauffeur");
        $stmt->bindValue(":idChauffeur", $idChauffeur, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBAllChVo() {
        $stmt = $this->pdo->query("SELECT * FROM Chauffeur 
        JOIN Voiture ON chauffeur.chauffeur_id = voiture.chauffeur_id
        GROUP BY voiture_id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDBChVoByID ($idChauffeur) {
        $requete = "SELECT * FROM Chauffeur 
        JOIN Voiture ON voiture.chauffeur_id = chauffeur.chauffeur_id
        WHERE chauffeur.chauffeur_id = :idChauffeur GROUP BY voiture_id
        ";
        $stmt = $this->pdo->prepare($requete);
        $stmt->bindValue(":idChauffeur", $idChauffeur, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createDBChauffeur($dataChauffeur){
        $requete = "INSERT INTO chauffeur (chauffeur_id, chauffeur_nom, chauffeur_telephone)
        VALUE (:id, :nom, :tel);
        ";
        $stmt = $this->pdo->prepare($requete);
        $stmt->bindParam(":id", $dataChauffeur["chauffeur_id"], PDO::PARAM_INT);
        $stmt->bindParam(":nom", $dataChauffeur["chauffeur_nom"], PDO::PARAM_STR);
        $stmt->bindParam(":tel", $dataChauffeur["chauffeur_telephone"], PDO::PARAM_INT);
        $stmt->execute();

        return $this->getDBChauffeurById($dataChauffeur["chauffeur_id"]);
    }
}

//$chauffeur1 = new ChauffeurModel();
//print_r($chauffeur1->getDBAllChauffeurs());

?>