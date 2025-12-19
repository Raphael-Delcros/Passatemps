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
class MessagerieDao
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

    /**
     * Trouve tous les messages
     *
     * @return array Liste des messages
     */
    public function findAllAssoc(): array
    {
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
    public function findAssoc(?int $id): ?array
    {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "message WHERE idMessage = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Trouve tous les comptes qui ont eu une conversation avec le compte donné
     *
     * @param integer|null $compteId Identifiant du compte.
     * @return array Liste des comptes associés au compte
     */
    public function findAssocComptes(?int $compteId): array
    {
        $sql = "SELECT idCompte , nom, prenom 
                FROM " . Config::get()['database']['prefixe_table'] . "compte 
                WHERE idCompte IN (
                    SELECT idCompteExpediteur 
                    FROM " . Config::get()['database']['prefixe_table'] . "message 
                    WHERE idCompteDestinataire = :compteId  
    
                UNION
    
                    SELECT idCompteDestinataire
                    FROM " . Config::get()['database']['prefixe_table'] . "message 
                    WHERE idCompteExpediteur = :compteId
                )";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['compteId' => $compteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Trouve tous les comptes qui ont eu une conversation avec le compte donné
     *
     * @param integer|null $compteId Identifiant du compte.
     * @return array Liste des comptes associés au compte
     */
    public function findAssocConversation(?int $compteId): array
    {
        $compteId2 = $_GET['id']; // ID du contact (depuis l'URL)
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "message 
            WHERE (idCompteExpediteur = :idA AND idCompteDestinataire = :idB)
            OR (idCompteExpediteur = :idB AND idCompteDestinataire = :idA)
            ORDER BY dateEnvoi ASC;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['idA' => $compteId, 'idB' => $compteId2]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Hydrate un tableau de données en un objet Messagerie
     *
     * @param array $data Données du message
     * @return Messagerie L'objet Messagerie hydraté
     */
    public function hydrate(array $data): Messagerie
    {
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
    public function hydrateAll(array $rows): array
    {
        $messageries = [];
        foreach ($rows as $row) {
            $messageries[] = $this->hydrate($row);
        }
        return $messageries;
    }
}
