<?php
/**
 * @file newsletter.dao.php
 * @brief Gère les opérations de la base de données pour la Newsletter.
 * 
 * @see Newsletter
 */

/**
 * @brief Gère les opérations sur la base de données pour la Newsletter
 */
class NewsletterDao
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
     * Trouve une email par son identifiant
     *
     * @param integer|null $id Identifiant de l'email.
     * @return Newsletter|null La Newsletter trouvée ou null si non trouvée
     */
    public function find(?int $id): ?Newsletter
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "newsletter WHERE idNewsletter = :id";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute(array("id" => $id));
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Newsletter');
        $commande = $pdoStatement->fetch();
        return $commande;
    }
    
    /**
     * Trouve toutes les Newsletter
     *
     * @return array Liste des Newsletter
     */
    public function findAllAssoc(): array
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "newsletter";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute();
        $commandes = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        return $commandes;
    }

    /**
     * Hydrate un tableau de données en une instance de Newsletter
     *
     * @param array $data Tableau associatif des données de la Newsletter
     * @return Newsletter Instance de Newsletter hydratée
     */
    public function hydrate(array $data): Newsletter
    {
        $commande = new Newsletter();
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($commande, $method)) {
                $commande->$method($value);
            }
        }
        return $commande;
    }

    /**
     * Hydrate un tableau de tableaux de données en une liste d'instances de Newsletter
     *
     * @param array $dataArray Tableau de tableaux associatifs des données sur Newsletter
     * @return array Liste d'instances de Newsletter hydratées
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
     * Trouve une newsletter par son email
     *
     * @param string $email L'email de la newsletter.
     * @return Newsletter|null La Newsletter trouvée ou null si non trouvée
     */
    public function findByEmail(string $email): ?Newsletter
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "newsletter WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Newsletter');
        return $stmt->fetch() ?: null;
    }

     /**
     * Inscrire un email à la newsletter
     *
     * @param string $email L'email à inscrire
     */
    
    public function inscrire(string $email): void
    {
        $sql = "INSERT INTO " . Config::get()['database']['prefixe_table'] . "newsletter (email) VALUES (:email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
    }
}
