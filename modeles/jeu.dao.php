<?php

class JeuDao
{
    private ?PDO $pdo;


    // --- Constucteur ---
    public function __construct(?PDO $pdo = null)
    {
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
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.DureePartie
            FROM jeu J
            LEFT JOIN cataloguer ON J.idJeu = cataloguer.idJeu 
            LEFT JOIN categorie ON cataloguer.idCategorie = categorie.idCategorie 
            LEFT JOIN photo ON J.idPhoto = photo.idPhoto
            WHERE J.idJeu = :id ;";

        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(['id' => $id]);
        $rows = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) {
            return null; // Aucun jeu trouvé
        }
        // On crée l'objet Jeu à partir de la première ligne
        $first = $rows[0];
        $jeu = new Jeu(
            $first['idJeu'],
            $first['nom'],
            $first['description'],
            $first['contenu'],
            $first['nbJoueursMin'],
            $first['nbJoueursMax'],
            $first['dateSortie'],
            $first['idJeuPrincipal'],
            $first['idPhoto'],
            $first['DureePartie'],
            $first['url']
        );
        // On récupère toutes les catégories du jeu
        $categories = [];
        foreach ($rows as $row) {
            $categories[] = $row['nomCategorie'];
        }
        // On les injecte dans l’objet
        $jeu->setCategories($categories);

        return $jeu;
    }


    public function findAll(): array
    {
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.DureePartie
            FROM jeu J
            LEFT JOIN cataloguer ON J.idJeu = cataloguer.idJeu 
            LEFT JOIN categorie ON cataloguer.idCategorie = categorie.idCategorie 
            LEFT JOIN photo ON J.idPhoto = photo.idPhoto
            ORDER BY J.idJeu;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) {
            return []; // Aucun jeu trouvé
        }

        $jeux = [];
        $jeuxTemp = [];

        // Regrouper les lignes par jeu
        foreach ($rows as $row) {
            $idJeu = $row['idJeu'];

            // Si on n’a pas encore créé le jeu, on le crée
            if (!isset($jeuxTemp[$idJeu])) {
                $jeuxTemp[$idJeu] = new Jeu(
                    $row['idJeu'],
                    $row['nom'],
                    $row['description'],
                    $row['contenu'],
                    $row['nbJoueursMin'],
                    $row['nbJoueursMax'],
                    $row['dateSortie'],
                    $row['idJeuPrincipal'],
                    $row['idPhoto'],
                    $row['DureePartie'],
                    $row['url']
                );
                $jeuxTemp[$idJeu]->setCategories([]);
            }

            // Ajouter la catégorie (s’il y en a une)
            if (!empty($row['nomCategorie'])) {
                $categories = $jeuxTemp[$idJeu]->getCategories();
                $categories[] = $row['nomCategorie'];
                $jeuxTemp[$idJeu]->setCategories($categories);
            }
        }

        // Transformer en tableau indexé
        foreach ($jeuxTemp as $jeu) {
            $jeux[] = $jeu;
        }

        return $jeux;
    }


    public function findAssoc(?int $id): ?array
    {
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.DureePartie
            FROM jeu J
            LEFT JOIN cataloguer ON J.idJeu = cataloguer.idJeu 
            LEFT JOIN categorie ON cataloguer.idCategorie = categorie.idCategorie 
            LEFT JOIN photo ON J.idPhoto = photo.idPhoto
            WHERE J.idJeu = :id ;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) return null;

        // Regrouper les catégories
        $jeu = $rows[0];
        $categories = [];

        foreach ($rows as $row) {
            if (!empty($row['nomCategorie'])) {
                $categories[] = $row['nomCategorie'];
            }
        }

        $jeu['categories'] = $categories;
        return $jeu;
    }


    public function findAllAssoc(): array
    {
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.DureePartie
            FROM jeu J
            LEFT JOIN cataloguer ON J.idJeu = cataloguer.idJeu 
            LEFT JOIN categorie ON cataloguer.idCategorie = categorie.idCategorie 
            LEFT JOIN photo ON J.idPhoto = photo.idPhoto
            ORDER BY J.idJeu;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$rows) return [];

        $jeuxAssoc = [];

        foreach ($rows as $row) {
            $idJeu = $row['idJeu'];
            if (!isset($jeuxAssoc[$idJeu])) {
                $jeuxAssoc[$idJeu] = $row;
                $jeuxAssoc[$idJeu]['categories'] = [];
            }

            if (!empty($row['nomCategorie'])) {
                $jeuxAssoc[$idJeu]['categories'][] = $row['nomCategorie'];
            }
        }

        return array_values($jeuxAssoc);
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
        $jeu->setIdJeuPrincipal($tableauAssoc['idJeuPrincipal']);
        $jeu->setCategories($tableauAssoc['categories'] ?? []);
        $jeu->setIdPhoto($tableauAssoc['idPhoto']);
        $jeu->setDureePartie($tableauAssoc['DureePartie']);
        $jeu->setUrlPhoto($tableauAssoc['url']);
        return $jeu;
    }


    public function hydrateAll($tableau): ?array
    {
        $jeux = [];
        foreach ($tableau as $tableauAssoc) {
            $jeu = $this->hydrate($tableauAssoc);
            $jeux[] = $jeu;
        }
        return $jeux;
    }

    public function findWithName(string $q): array
    {
        $sql = "SELECT idJeu, nom
            FROM jeu
            WHERE LOWER(nom) LIKE :q
            ORDER BY nom
            LIMIT 10"; // on limite à 10 résultats

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['q' => '%' . strtolower($q) . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function research(string $q): array
    {
    $sql = "SELECT J.idJeu, J.nom, J.nbJoueursMin, J.nbJoueursMax, P.url
            FROM jeu J
            LEFT JOIN photo P ON J.idPhoto = P.idPhoto
            WHERE LOWER(J.nom) LIKE :q
            ORDER BY J.nom";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['q' => '%' . strtolower($q) . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
