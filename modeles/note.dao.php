<?php
/** 
 * Dao de la classe Note
 */


class NoteDAO{
    private ?PDO $pdo;

    /**
     * Créer un lien vers la base de données
     *
     * @param PDO|null $pdo Lien PDO vers la base de données
     */

    public function __construct(?PDO $pdo = null){
        $this->pdo = $pdo;
    }

    // --- Getters & Setters ---

    public function getPdo(): ?PDO{
        return $this->pdo;
    }

    public function setPdo(?PDO $pdo): void{
        $this->pdo = $pdo;
    }
    
    // --- Functions ---
    /**
     * Trouver la note de l'idCompteNote mise par l'idCompteQuiNote
     */

    public function findNote(?int $idCompteQuiNote, ?int $idCompteNote): ?int{
        $sql="SELECT n.note FROM ".Config::get()['database']['prefixe_table']."note n WHERE n.idCompteQuiNote= :idCompteQuiNote AND n.idCompteNote= :idCompteNote";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("idCompteQuiNote"=>$idCompteQuiNote,"idCompteNote"=>$idCompteNote));
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Note');
        $note = $pdoStatement->fetch();
        return $note;
    }

}