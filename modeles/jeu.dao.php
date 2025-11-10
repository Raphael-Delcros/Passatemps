<?php

class JeuDao{
    private ?PDO $pdo;


// --- Constucteur ---
    
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

 // --- Fonctions ---
    public function find(?int $id): ?Jeu
    {
        $sql="SELECT * FROM ".PREFIXE_TABLE." jeu WHERE idJeu= :id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("id"=>$id));
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jeu');
        $jeu = $pdoStatement->fetch();
        return $jeu;
    }

    public function findAll(){
        $sql="SELECT * FROM ".PREFIXE_TABLE."jeu";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Jeu');
        $jeu = $pdoStatement->fetchAll();
        return $jeu;
    }

    public function findAssoc(?int $id): ?array
    {
        $sql="SELECT * FROM ".PREFIXE_TABLE."jeu WHERE idJeu= :id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("id"=>$id));
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $jeu = $pdoStatement->fetch();
        return $jeu;
    }

    public function findAllAssoc(){
        $sql="SELECT * FROM ".PREFIXE_TABLE."jeu";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $jeu = $pdoStatement->fetchAll();
        return $jeu;
    }

    public function hydrate($tableauAssoc): ?Jeu
    {
        $jeu = new Jeu();
        $jeu->setIdJeu($tableauAssoc['idJeu']);
        $jeu->setNom($tableauAssoc['nom']);
        $jeu->setDescription($tableauAssoc['description']);
        $jeu->setContenu($tableauAssoc['contenu']);
        $jeu->setNbJoueursMin($tableauAssoc['nbJoueursMin']);
        $jeu->setNbJoueursMax($tableauAssoc['nbJoueursMax']);
        $jeu->setDateSortie($tableauAssoc['dateSortie']);
        $jeu->setIdJeuPrincipale($tableauAssoc['idJeuPrincipale']);
        return $jeu;
    }

    public function hydrateAll($tableau): ?array{
        $jeux = [];
        foreach($tableau as $tableauAssoc){
            $jeu = $this->hydrate($tableauAssoc);
            $jeux[] = $jeu; 
        }
        return $jeux;
    }
}
/**
 * Utilisation :
 * $managerJeu = new jeuDao($pdo);
 * $jeux = managerJeu->findAll();
 */
?>