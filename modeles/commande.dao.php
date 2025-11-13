<?php

class CommandeDao {

    private ?PDO $pdo;

    public function __construct(?PDO $pdo=null){
        $this->pdo = $pdo;
    }

 // --- Getters & Setters ---
    public function getPdo(): ?PDO
    {
        return $this->pdo;
    }
    public function setPdo($pdo): void
    {
        $this->pdo = $pdo;
    }

    // --- Functions ---

        public function find(?int $id): ?Commande
        {
            $sql = "SELECT * FROM". PREFIXE_TABLE. "livraison WHERE idLivraison = :id";
            $pdoStatement = $this->pdo->prepare($sql);
            $pdoStatement->execute(array("id"=>$id));
            $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Commande');
            $commande = $pdoStatement->fetch();
            return $commande;
        }

}