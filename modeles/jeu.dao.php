<?php
/**
 * @file jeu.dao.php
 * @brief DAO pour la gestion des jeux
 */
class JeuDao
{
    private ?PDO $pdo;

    /**
     * @brief Constructeur
     */
    public function __construct(?PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }
    /**
     * Get the value of pdo
     */
    public function getPdo(): ?PDO
    {
        return $this->pdo;
    }
    /**
     * Set the value of pdo
     *
     * @return  void
     */
    public function setPdo($pdo): void
    {
        $this->pdo = $pdo;
    }
    /**
     * @brief Récupère un jeu par son ID
     */
    public function find(?int $id): ?Jeu
    {
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.dureePartie
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
            $first['dureePartie'],
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

    /**
     * @brief Récupère tous les jeux
     */
    public function findAll(): array
    {
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.dureePartie
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
                    $row['dureePartie'],
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

    /**
     * @brief Récupère un jeu sous forme de tableau associatif
     */
    public function findAssoc(?int $id): ?array
    {
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.dureePartie
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

    /**
     * @brief Récupère tous les jeux sous forme de tableaux associatifs
     */
    public function findAllAssoc(): array
    {
        $sql = "SELECT J.idJeu, J.nom, J.description, J.contenu, 
                   J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                   J.idJeuPrincipal, categorie.nom AS nomCategorie, J.idPhoto,
                    photo.url, J.dureePartie
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


    /**
     * @brief Hydrate un tableau associatif en objet Jeu
     */
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
        $jeu->setdureePartie($tableauAssoc['dureePartie']);
        $jeu->setUrlPhoto($tableauAssoc['url']);
        return $jeu;
    }

    /**
     * @brief Hydrate un tableau de tableaux associatifs en tableaux d'objets Jeu
     */
    public function hydrateAll($tableau): ?array
    {
        $jeux = [];
        foreach ($tableau as $tableauAssoc) {
            $jeu = $this->hydrate($tableauAssoc);
            $jeux[] = $jeu;
        }
        return $jeux;
    }
    /**
     * @brief Recherche des jeux par nom (pour l'autocomplétion)
     */
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

    /**
     * @brief Recherche des jeux par nom (pour la page de recherche)
     */
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

    /**
     * @brief Ajoute un jeu dans la base de données
     * *
     * @param Jeu $jeu Jeu à ajouter
     * @return boolean True si l'ajout a réussi, false sinon
     */
    public function addToDatabase(Jeu $jeu): bool
    {
        $sql = "INSERT INTO jeu (nom, description, contenu, nbJoueursMin, nbJoueursMax, dateSortie, idJeuPrincipal, idPhoto, dureePartie)
                VALUES (:nom, :description, :contenu, :nbJoueursMin, :nbJoueursMax, :dateSortie, :idJeuPrincipal, :idPhoto, :dureePartie)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nom' => $jeu->getNom(),
            'description' => $jeu->getDescription(),
            'contenu' => $jeu->getContenu(),
            'nbJoueursMin' => $jeu->getNbJoueursMin(),
            'nbJoueursMax' => $jeu->getNbJoueursMax(),
            'dateSortie' => $jeu->getDateSortie(),
            'idJeuPrincipal' => $jeu->getIdJeuPrincipal(),
            'idPhoto' => $jeu->getIdPhoto(),
            'dureePartie' => $jeu->getdureePartie()
        ]);
    }

    /**
     * @brief Récupère une page de jeux pour la pagination
     * @todo A faire 
     */
    public function findPage(int $page, int $parPage): array
    {
        $offset = ($page - 1) * $parPage;

        $sql = "SELECT J.idJeu, J.nom, J.nbJoueursMin, J.nbJoueursMax, photo.url 
            FROM jeu J
            LEFT JOIN photo ON J.idPhoto = photo.idPhoto
            ORDER BY J.idJeu
            LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', $parPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * @brief Compte le nombre total de jeux dans la base de données
     */
    public function countAll(): int
    {
        $sql = "SELECT COUNT(*) FROM jeu";
        return (int) $this->pdo->query($sql)->fetchColumn();
    }
    /**
     * Supprime un jeu de la base de données
     */
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM jeu WHERE idJeu = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    /**
     * @brief Met à jour les informations d'un Jeu dans la base de données
     */
    public function update(Jeu $jeu): bool
    {
        $sql = "UPDATE jeu SET 
            nom = :nom, 
            description = :description, 
            contenu = :contenu, 
            nbJoueursMin = :nbJoueursMin, 
            nbJoueursMax = :nbJoueursMax, 
            dateSortie = :dateSortie, 
            idJeuPrincipal = :idJeuPrincipal, 
            idPhoto = :idPhoto, 
            dureePartie = :dureePartie
            WHERE idJeu = :idJeu";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nom' => $jeu->getNom(),
            'description' => $jeu->getDescription(),
            'contenu' => $jeu->getContenu(),
            'nbJoueursMin' => $jeu->getNbJoueursMin(),
            'nbJoueursMax' => $jeu->getNbJoueursMax(),
            'dateSortie' => $jeu->getDateSortie(),
            'idJeuPrincipal' => $jeu->getIdJeuPrincipal(),
            'idPhoto' => $jeu->getIdPhoto(),
            'dureePartie' => $jeu->getdureePartie(),
            'idJeu' => $jeu->getIdJeu()
        ]);
    }


    /**
     * Recherche de jeux avec filtres dynamiques
     * 
     * @param JeuFilter $filter Instance de JeuFilter configurée
     * @return array Liste des jeux correspondant aux filtres
     */
    public function findWithFilters(JeuFilter $filter): array
    {
        $sql = "SELECT DISTINCT J.idJeu, J.nom, J.description, J.contenu, 
               J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
               J.idJeuPrincipal, J.idPhoto, J.dureePartie, P.url
        FROM jeu J
        LEFT JOIN photo P ON J.idPhoto = P.idPhoto"
            . $filter->buildJoins() . " "
            . $filter->buildWhereClause();

        // Si on a un filtre strict sur les catégories,  grouper et utiliser HAVING
        $havingClause = $filter->buildHavingClause();
        if (!empty($havingClause)) {
            $sql .= " GROUP BY J.idJeu, J.nom, J.description, J.contenu, 
                         J.nbJoueursMin, J.nbJoueursMax, J.dateSortie, 
                         J.idJeuPrincipal, J.idPhoto, J.dureePartie, P.url "
                . $havingClause;
        }

        $sql .= " ORDER BY J.nom";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($filter->getParams());

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Compte le nombre de jeux correspondant aux filtres
     * 
     * @param JeuFilter $filter Instance de JeuFilter configurée
     * @return int Nombre de jeux trouvés
     */
    public function countWithFilters(JeuFilter $filter): int
    {
        $havingClause = $filter->buildHavingClause();

        if (!empty($havingClause)) {
            // Avec HAVING, on doit faire un sous-requête
            $sql = "SELECT COUNT(*) FROM (
            SELECT J.idJeu
            FROM jeu J"
                . $filter->buildJoins() . " "
                . $filter->buildWhereClause() . "
            GROUP BY J.idJeu "
                . $havingClause . "
        ) AS filtered_jeux";
        } else {
            $sql = "SELECT COUNT(DISTINCT J.idJeu) 
            FROM jeu J"
                . $filter->buildJoins() . " "
                . $filter->buildWhereClause();
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($filter->getParams());

        return (int) $stmt->fetchColumn();
    }
}
