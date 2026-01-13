<?php
/**
 * @file livraison.dao.php
 * @brief Gère les opérations de la base de données pour les Livraison.
 * 
 * @see Livraison
 */

/**
 * @brief Gère les opérations sur la base de données pour les Livraison
 */
class LivraisonDao
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

    // --- Getters & Setters ---
    public function getPdo(): ?PDO
    {
        return $this->pdo;
    }
    public function setPdo($pdo): void
    {
        $this->pdo = $pdo;
    }

    // --- Functions ---
    /**
     * Trouve une livraison par son identifiant
     *
     * @param integer|null $id Identifiant de la livraison
     * @return Livraison|null La livraison trouvée ou null si non trouvée
     */
    public function find(?int $id): ?Livraison
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "livraison WHERE idLivraison = :id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("id" => $id));
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Livraison');
        $commande = $pdoStatement->fetch();
        return $commande;
    }
    
    /**
     * Trouve toutes les livraisons
     *
     * @return array Liste des livraisons
     */
    public function findAllAssoc(): array
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "livraison";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
        $commandes = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        return $commandes;
    }

        /**
     * Trouve toutes les livraisons
     *
     * @return array Liste des livraisons
     */
    public function findAllAssocFromIdWithAnnonceInfo( ?int $idCompte ): array
    {
        $sql = "SELECT l.*, a.titre, a.prix FROM " . Config::get()['database']['prefixe_table'] . "livraison l JOIN " . Config::get()['database']['prefixe_table'] . "annonce a ON l.idAnnonce = a.idAnnonce WHERE l.idCompteAcheteur = :idCompte";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("idCompte" => $idCompte));
        $commandes = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        return $commandes;
    }

    /**
     * Hydrate un tableau de données en une instance de Livraison
     *
     * @param array $data Tableau associatif des données de la livraison
     * @return Livraison Instance de Livraison hydratée
     */
    public function hydrate(array $data): Livraison
    {
        $commande = new Livraison();
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($commande, $method)) {
                $commande->$method($value);
            }
        }
        return $commande;
    }

    /**
     * Hydrate un tableau de tableaux de données en une liste d'instances de Livraison
     *
     * @param array $dataArray Tableau de tableaux associatifs des données des livraisons
     * @return array Liste d'instances de Livraison hydratées
     */
    public function hydrateAll(array $dataArray): array
    {
        $commandes = [];
        foreach ($dataArray as $data) {
            $commandes[] = $this->hydrate($data);
        }
        return $commandes;
    }

    /**
     * Récupère le titre et le prix de l'annonce associée à une livraison donnée
     *
     * @param integer $idLivraison Identifiant de la livraison
     * @return array|null Tableau associatif contenant le titre et le prix de l'annonce, ou null si non trouvée
     */
    public function getInfoAnnonceByLivraisonId(int $idLivraison): ?array
    {
        $sql = "SELECT a.titre, a.prix FROM " . Config::get()['database']['prefixe_table'] . "annonce a
                    JOIN " . Config::get()['database']['prefixe_table'] . "livraison l ON a.idAnnonce = l.idAnnonce
                    WHERE l.idLivraison = :idLivraison";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("idLivraison" => $idLivraison));
        $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
        $annonce = $pdoStatement->fetch();
        return $annonce;
    }
}
