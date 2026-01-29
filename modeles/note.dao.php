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

    public function hydrate(array $tableauAssoc): ?Note{
        return new Note(
            $tableauAssoc['idCompteQuiNote'] ?? null,
            $tableauAssoc['idCompteNote'] ?? null,
            $tableauAssoc['note'] ?? null
        );
    }
    public function hydrateAll(array $tableau): array{
        $note = [];
        foreach($tableau as $tableauAssoc){
            $note[] = $this->hydrate($tableauAssoc);
        }
        return $note;
    }

    public function findAssoc(?int $idComteQuiNote, ?int $idComteNote): ?array{
        $sql="SELECT * FROM ".Config::get()['database']['prefixe_table']."note WHERE idCompteQuiNote= :idCompteQuiNote AND idCompteNote= :idCompteNote";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("idCompteQuiNote"=>$idCompteQuiNote,"idCompteNote"=>$idCompteNote));
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        return $pdoStatement->fetch() ?: null;
    }

    public function findAllAssoc(): array{
        $sql = "SELECT * FROM ".Config::get()['database']['prefixe_table']."note n ORDER BY n.idCompteNote";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        return $pdoStatement->fetchAll();
    }

    public function find(?int $idComteQuiNote, ?int $idComteNote): ?Note{
        $tableauAssoc = $this->findAssoc($idComteQuiNote, $idComteNote);
        if($tableauAssoc){
            return $this->hydrate($tableauAssoc);
        }
        return null;
    }

    public function findAll(): array{
        $tableau = $this->findAllAssoc();
        return $this->hydrateAll($tableau);
    }

    public function findAverage(?int $idCompteNote){
        
        $sql = "SELECT AVG(n.note) FROM " . Config::get()['database']['prefixe_table'] . "note n WHERE n.idCompteNote= :idCompteNote";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['idCompteNote' => $idCompteNote]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch() ?: null;

    }
}