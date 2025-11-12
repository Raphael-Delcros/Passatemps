<?php

class PhotoDao {
    private ?PDO $pdo;

    public function __construct(?PDO $pdo = null) {
        $this->pdo = $pdo;
    }

    public function findAllAssoc(): array {
        $sql = "SELECT * FROM " . PREFIXE_TABLE . "photo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAssoc(?int $id): ?array {
        $sql = "SELECT * FROM " . PREFIXE_TABLE . "photo WHERE idPhoto = :id";
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
}
