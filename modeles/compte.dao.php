<?php

class CompteDao
{
    private ?PDO $pdo;

    public function __construct(?PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }

    public function getPdo(): ?PDO
    {
        return $this->pdo;
    }
    public function setPdo(?PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    // Récupérer un compte par ID en tant qu'objet Compte
    public function find(?int $id): ?Compte
    {
        $tableauAssoc = $this->findAssoc($id);
        if ($tableauAssoc) {
            return $this->hydrate($tableauAssoc);
        }
        return null;
    }

    // Récupérer tous les comptes en tant qu'objets Compte
    public function findAll(): array
    {
        $tableau = $this->findAllAssoc();
        return $this->hydrateAll($tableau);
    }

    // Récupérer un compte en tableau associatif
    public function findAssoc(?int $id): ?array
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "compte WHERE idCompte = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch() ?: null;
    }

    // Récupérer tous les comptes en tableau associatif
    public function findAllAssoc(): array
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "compte";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    // Hydrater un compte depuis un tableau associatif
    public function hydrate(array $tableauAssoc): ?Compte
    {
        $compte = new Compte();
        $compte->setIdCompte($tableauAssoc['idCompte'] ?? null);
        $compte->setNom($tableauAssoc['nom'] ?? '');
        $compte->setPrenom($tableauAssoc['prenom'] ?? '');
        $compte->setEmail($tableauAssoc['email'] ?? '');
        $compte->setMotDePasseHache($tableauAssoc['motDePasseHache'] ?? '');
        $compte->setDateInscription($tableauAssoc['dateInscription'] ?? null);
        $compte->setNote($tableauAssoc['note'] ?? null);
        $compte->setRole($tableauAssoc['role'] ?? '');
        return $compte;
    }

    // Hydrater plusieurs comptes depuis un tableau de tableaux associatifs
    public function hydrateAll(array $tableau): array
    {
        $comptes = [];
        foreach ($tableau as $tableauAssoc) {
            $comptes[] = $this->hydrate($tableauAssoc);
        }
        return $comptes;
    }
}
