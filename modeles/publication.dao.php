<?php

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
        $tableauAssoc = $this->findAssoc($id);
        if($tableauAssoc){
            return $this->hydrate($tableauAssoc);
        }
        return null;
    }

    public function findAll(): array{
        $tableau = $this->findAllAssoc();
        return $this->hydrateAll($tableau);
    }

    public function findAssoc(?int $id): ?array{
        $sql = "SELECT * FROM ".PREFIXE_TABLE."publication WHERE idPost = :idPost";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch() ?: null;
    }

    public function findAllAssoc(): array{
        $sql = "SELECT * FROM ".PREFIXE_TABLE."publication";
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
            $tableauAssoc['datePublication'] ?? null
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