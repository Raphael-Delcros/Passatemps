<?php

class MessagerieDao {
    private ?PDO $pdo;

    public function __construct(?PDO $pdo = null) {
        $this->pdo = $pdo;
    }

    public function findAllAssoc(): array {
        $sql = "SELECT * FROM " . PREFIXE_TABLE . "message";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAssoc(?int $id): ?array {
        $sql = "SELECT * FROM " . PREFIXE_TABLE . "message WHERE idMessage = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function hydrate(array $data): Messagerie {
        $messagerie = new Messagerie();
        $messagerie->setIdMessage($data['idMessage'] ?? null);
        $messagerie->setContenu($data['contenu'] ?? null);
        $messagerie->setDateEnvoi($data['dateEnvoi'] ?? null);
        $messagerie->setIdCompteExpediteur($data['idCompteExpediteur'] ?? null);
        $messagerie->setIdCompteDestinataire($data['idCompteDestinataire'] ?? null);
        return $messagerie;
    }

    public function hydrateAll(array $rows): array {
        $messageries = [];
        foreach ($rows as $row) {
            $messageries[] = $this->hydrate($row);
        }
        return $messageries;
    }
}