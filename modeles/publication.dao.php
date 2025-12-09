<?php
/** 
 * Dao de la classe Publication
 */


class publicationDAO{
    private ?PDO $pdo;

    public function __construct(?PDO $pdo = null){
        $this->pdo = $pdo;
    }

    public function getPdo(): ?PDO{
        return $this->pdo;
    }

    public function setPdo(?PDO $pdo): void{
        $this->pdo = $pdo;
    }

    public function find(?int $id): ?Publication{
        $sql="SELECT * FROM ".Config::get()['database']['prefixe_table']."publication WHERE idPost= :id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("id"=>$id));
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Publication');
        $publication = $pdoStatement->fetch();
        return $publication;
    }

    public function findAll(): array{
        $tableau = $this->findAllAssoc();
        return $this->hydrateAll($tableau);
    }

    public function findAssoc(?int $id): ?array{
        $sql = "SELECT * FROM ".Config::get()['database']['prefixe_table']."publication WHERE idPost = :idPost";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch() ?: null;
    }

    public function findAllAssoc(): array{
        $sql = "SELECT * FROM ".Config::get()['database']['prefixe_table']."publication";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function hydrate(array $tableauAssoc): ?Publication{
        return new Publication(
            $tableauAssoc['idPost'] ?? null,
            $tableauAssoc['sujet'] ?? null,
            $tableauAssoc['contenu'] ?? null,
            $tableauAssoc['datePublication'] ?? null,
            $tableauAssoc['idPostPrincipale'] ?? null,
            $tableauAssoc['idCompte'] ?? null
        );
    }

    public function hydrateAll(array $tableau): array{
        $publications = [];
        foreach($tableau as $tableauAssoc){
            $publications[] = $this->hydrate($tableauAssoc);
        }
        return $publications;
    }

    
}