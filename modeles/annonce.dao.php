<?php

/**
 * @file annonce.dao.php
 * @brief Définit la classe AnnonceDao pour gérer les opérations BDD sur les annonces.
 * 
 */

/**
 * @brief Classe DAO pour gérer les opérations BDD sur les annonces
 */
class AnnonceDao
{
    private ?PDO $pdo;

    /**
     * Créer un lien vers la base de données
     *
     * @param PDO|null $pdo Lien PDO vers la base de données
     */
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

    /**
     * Renvoie une annonce selon son identifiant sous forme d'objet Annonce
     *
     * @param integer|null $id
     * @return Annonce|null
     */
    public function find(?int $id): ?Annonce
    {
        $tableauAssoc = $this->findAssoc($id);
        if ($tableauAssoc) {
            return $this->hydrate($tableauAssoc);
        }
        return null;
    }
    /**
     * Renvoie toutes les annonces sous forme de tableau d'objets Annonce
     *
     * @return Annonce[]
     */
    public function findAll(): array
    {
        $tableau = $this->findAllAssoc();
        return $this->hydrateAll($tableau);
    }

    /**
     * Renvoie une annonce selon son identifiant sous forme de tableau associatif
     *
     * @param integer|null $id
     * @return array|null
     */
    public function findAssoc(?int $id)
    {
        $sql = "SELECT a.idAnnonce, a.titre, a.description, a.prix, a.datePub, a.etatJeu, a.etatVente, a.idJeu, a.idCompteVendeur, p.url
        FROM annonce a
        LEFT JOIN photo p ON p.idAnnonce = a.idAnnonce
        WHERE a.idAnnonce = :id";


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch() ?: null;
    }
    /**
     * Renvoie toutes les annonces sous forme de tableau associatif
     *
     * @return array
     */
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
    /**
     * Hydrate un tableau associatif en un objet Annonce
     *
     * @param array|null $tableauAssoc
     * @return Annonce|null
     */
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
        $annonce->setUrlPhoto($tableauAssoc['url'] ?? null);
        return $annonce;
    }
    /**
     * Hydrate un tableau de tableaux associatifs en un tableau d'objets Annonce
     *
     * @param array|null $tableauAssoc
     * @return Annonce[]
     */
    public function hydrateAll(?array $tableauAssoc): array
    {
        $annonces = [];
        foreach ($tableauAssoc as $tableau) {
            $annonces[] = $this->hydrate($tableau);
        }
        return $annonces;
    }
    /**
     * Insère une nouvelle annonce dans la base de données
     *
     * @param Annonce $annonce L'objet Annonce à insérer
     * @return bool Succès ou échec de l'insertion
     */
    public function InsertInto(Annonce $annonce): bool
    {
        // On ajoute explicitement idAnnonce dans la requête
        $sql = "INSERT INTO " . Config::get()['database']['prefixe_table'] . "annonce 
        (idAnnonce, titre, description, prix, datePub, etatJeu, etatVente, idJeu, idCompteVendeur) 
        VALUES (:id, :titre, :description, :prix, :datePub, :etatJeu, :etatVente, :idJeu, :idCompteVendeur)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id'              => $annonce->getIdAnnonce(), // Utilise l'ID calculé par lastId()
            'titre'           => $annonce->getTitre(),
            'description'     => $annonce->getDescription(),
            'prix'            => $annonce->getPrix(),
            'datePub'         => $annonce->getDatePub(),
            'etatJeu'         => $annonce->getEtatJeu(),
            'etatVente'       => $annonce->getEtatVente(),
            'idJeu'           => $annonce->getIdJeu(),
            'idCompteVendeur' => $annonce->getIdCompteVendeur()
        ]);
    }
    /**
     * Récupère le dernier identifiant d'annonce utilisé
     *
     * @return int Le dernier identifiant d'annonce
     */
    public function lastId(): int
    {
        $sql = "SELECT MAX(idAnnonce) AS max_id FROM annonce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $id = $stmt->fetch() ?: null;
        $idAnnonce = $id['max_id'] + 1;
        return $idAnnonce;
    }

    /**
     * Récupère les annonces associées à un jeu
     *
     * @param int $idJeu Identifiant du jeu
     * @return Annonce[] Liste des annonces du jeu
     */
    public function findByJeu(int $idJeu): array
    {
        $sql = "
        SELECT a.idAnnonce, a.titre, a.description, a.prix, a.datePub,
               a.etatJeu, a.etatVente, a.idJeu, a.idCompteVendeur, p.url
        FROM annonce a
        LEFT JOIN photo p ON p.idAnnonce = a.idAnnonce
        WHERE a.idJeu = :idJeu
          
        ORDER BY a.datePub DESC
    ";
        //AND a.etatVente = 'en Vente'

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['idJeu' => $idJeu]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $this->hydrateAll($stmt->fetchAll());
    }
    /**
     * Recherche des annonces par mot-clé dans le titre
     *
     * @param string $q Mot-clé de recherche
     * @return array Liste des annonces correspondantes
     */
    public function research(string $q): array
    {
        $sql = "SELECT A.idAnnonce, A.titre, A.description, A.prix, A.datePub, A.etatJeu, A.etatVente, A.idJeu, A.idCompteVendeur, P.url
            FROM annonce A
            LEFT JOIN photo P ON A.idPhoto = P.idPhoto
            WHERE LOWER(A.titre) LIKE :q
            ORDER BY A.titre";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['q' => '%' . strtolower($q) . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Supprime une annonce de la base de données
     */
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM annonce WHERE idAnnonce = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Met à jour une annonce existante
     */
    public function update(Annonce $annonce): bool
    {
        $sql = "UPDATE annonce SET 
            titre = :titre, 
            description = :description, 
            prix = :prix, 
            etatJeu = :etatJeu, 
            etatVente = :etatVente, 
            idJeu = :idJeu 
            WHERE idAnnonce = :idAnnonce";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'titre'       => $annonce->getTitre(),
            'description' => $annonce->getDescription(),
            'prix'        => $annonce->getPrix(),
            'etatJeu'     => $annonce->getEtatJeu(),
            'etatVente'   => $annonce->getEtatVente(),
            'idJeu'       => $annonce->getIdJeu(),
            'idAnnonce'   => $annonce->getIdAnnonce()
        ]);
    }

    /**
     * Retrouve le compte qui à posté l'annonce
     * 
     * @return array
     * 
     */

     public function findAccount(int $q)
    {
        $sql = "SELECT C.Nom, C.prenom FROM annonce A
            JOIN Compte C ON A.idCompte = C.idCompte 
            WHERE A.idCompte LIKE :q";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['q' => '%' . strtolower($q) . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
