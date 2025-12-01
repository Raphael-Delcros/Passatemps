<?php
/**
 * @file messagerie.dao.php
 * @brief Gère les opérations de la base de données pour la Messagerie.
 * 
 * @see Messagerie
 */

/**
 * @brief Gère les opérations sur la base de données pour la Messagerie
 */
class MessagerieDao {
    private ?PDO $pdo;

    /**
     * Créer un lien vers la base de données
     *
     * @param PDO|null $pdo Lien PDO vers la base de données
     */
    public function __construct(?PDO $pdo = null) {
        $this->pdo = $pdo;
    }
    
    /**
     * Trouve tous les messages
     *
     * @return array Liste des messages
     */
    public function findAllAssoc(): array {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "message";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Trouve un message selon son identifiant
     *
     * @param integer|null $id Identifiant du message.
     * @return array|null Le message trouvé ou null si non trouvé
     */
    public function findAssoc(?int $id): ?array {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "message WHERE idMessage = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Hydrate un tableau de données en un objet Messagerie
     *
     * @param array $data Données du message
     * @return Messagerie L'objet Messagerie hydraté
     */
    public function hydrate(array $data): Messagerie {
        $messagerie = new Messagerie();
        $messagerie->setIdMessage($data['idMessage'] ?? null);
        $messagerie->setContenu($data['contenu'] ?? null);
        $messagerie->setDateEnvoi($data['dateEnvoi'] ?? null);
        $messagerie->setIdCompteExpediteur($data['idCompteExpediteur'] ?? null);
        $messagerie->setIdCompteDestinataire($data['idCompteDestinataire'] ?? null);
        return $messagerie;
    }

    /**
     * Hydrate un tableau de données en une liste d'objets Messagerie
     *
     * @param array $rows Liste des données des messages
     * @return array Liste des objets Messagerie hydratés
     */
    public function hydrateAll(array $rows): array {
        $messageries = [];
        foreach ($rows as $row) {
            $messageries[] = $this->hydrate($row);
        }
        return $messageries;
    }
}