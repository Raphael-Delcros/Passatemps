<?php

class PhotoDao {
    private ?PDO $pdo;

    public function __construct(?PDO $pdo = null) {
        $this->pdo = $pdo;
    }

    public function findAllAssoc(): array {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "photo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAssoc(?int $id): ?array {
        $sql = "SELECT * FROM " . Config::get()['database']['prefixe_table'] . "photo WHERE idPhoto = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function hydrate(array $data): Photo {
        $photo = new Photo();
        $photo->setIdPhoto($data['idPhoto'] ?? null);
        $photo->setUrl($data['url'] ?? '');
        $photo->setIdAnnonce($data['idAnnonce'] ?? null);
        $photo->setIdMessage($data['idMessage'] ?? null);
        return $photo;
    }

    public function hydrateAll(array $rows): array {
        $photos = [];
        foreach ($rows as $row) {
            $photos[] = $this->hydrate($row);
        }
        return $photos;
    }
    
    /**
     * @brief Ajoute une photo à la base de données
     * 
     * Note : L'ID de la photo est auto-incrémenté par la base de données
     * 
     * @param Photo $photo Photo à ajouter
     * @return boolean True si l'ajout a réussi, false sinon
     */
    public function addToDatabase(Photo $photo): bool {
        $sql = "INSERT INTO " . Config::get()['database']['prefixe_table'] . "photo (url, idAnnonce, idMessage) 
                VALUES (:url, :idAnnonce, :idMessage)";
        $stmt = $this->pdo->prepare($sql);
        $params = [
            'url' => $photo->getUrl(),
            'idAnnonce' => $photo->getIdAnnonce(),
            'idMessage' => $photo->getIdMessage()
        ];
        return $stmt->execute($params);
    }
}
