<?php

Class AnnonceDao 
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

    public function find(?int $id): ?Annonce
    {
        $tableauAssoc = $this->findAssoc($id);
        if ($tableauAssoc) {
            return $this->hydrate($tableauAssoc);
        }
        return null;
    }

    public function findAll(): array
    {
        $tableau = $this->findAllAssoc();
        return $this->hydrateAll($tableau);
    }

    public function findAssoc(?int $id)
    {
        $sql = "SELECT a.idAnnonce, a.titre, a.description, a.prix, a.datePub, a.etatJeu, a.etatVente, a.idJeu, a.idCompteVendeur, p.url
        FROM annonce a
        LEFT JOIN photo p ON photo.idAnnonce = a.idAnnonce
        WHERE a.idAnnonce = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch() ?: null;
    }

    public function findAllAssoc(): array
    {
        $sql = "SELECT a.idAnnonce, a.titre, a.description, a.prix, a.datePub, a.etatJeu, a.etatVente, a.idJeu, a.idCompteVendeur, p.url
        FROM annonce a
        LEFT JOIN photo p ON p.idAnnonce = a.idAnnonce
        ORDER BY a.idAnnonce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function hydrate(?array $tableauAssoc): ?Annonce
    {
        $annonce = new annonce();
        $annonce->setIdAnnonce($tableauAssoc['idAnnonce'] ?? null);
        $annonce->setTitre($tableauAssoc['titre'] ?? null);
        $annonce->setDescription($tableauAssoc['description'] ?? null);
        $annonce->setPrix($tableauAssoc['prix'] ?? null);
        $annonce->setDatePub($tableauAssoc['datePub'] ?? null);
        $annonce->setEtatJeu($tableauAssoc['etatJeu'] ?? null);
        $annonce->setEtatVente($tableauAssoc['etatVente'] ?? null);
        $annonce->setIdJeu($tableauAssoc['idJeu'] ?? null);
        $annonce->setIdCompteVendeur($tableauAssoc['idCompteVendeur'] ?? null);
        $annonce->setUrlPhoto($tableauAssoc['urlPhoto'] ?? null );
        return $annonce;
    }

    public function hydrateAll()
    {
        $annonces = [];
        foreach ($tableau as $tableauAssoc) {
            $annonces[] = $this->hydrate($tableauAssoc);
        }
        return $annonces;
    }


}