<?php

class bannissementDAO{

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

    public function find(?int $id): ?Bannissement{
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
        $sql = "SELECT * FROM ".Config::get()['database']['prefixe_table']."bannissement WHERE idBannissement = :idBannissement";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['idBannissement' => $id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch() ?: null;
    }

    public function findAllAssoc(): array{
        $sql = "SELECT * FROM ".Config::get()['database']['prefixe_table']."bannissement";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function hydrate(array $tableauAssoc): ?Bannissement{
        return new Bannissement(
            $tableauAssoc['idBannissement'] ?? null,
            $tableauAssoc['idBanni'] ?? null,
            $tableauAssoc['idBannisseur'] ?? null,
            $tableauAssoc['dateDeb'] ?? null,
            $tableauAssoc['dateFin'] ?? null,
            $tableauAssoc['sujet'] ?? null,
            $tableauAssoc['Raison'] ?? null
        );
    }

    public function hydrateAll(array $tableau): array{
        $bannissements = [];
        foreach($tableau as $tableauAssoc){
            $bannissements[] = $this->hydrate($tableauAssoc);
        }
        return $bannissements;
    }
}