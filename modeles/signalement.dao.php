<?php
class SignalementDao {
    private ?PDO $pdo;

    public function __construct(?PDO $pdo = null) {
        $this->pdo = $pdo;
    }

    public function findAllAssoc(): array {
        $sql = "SELECT * FROM " . PREFIXE_TABLE . "signalement";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAssoc(?int $id): ?array {
        $sql = "SELECT * FROM " . PREFIXE_TABLE . "signalement WHERE idSign = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function hydrate(array $data): Signalement {
        $signalement = new Signalement();
        $signalement->setIdSign($data['idSign'] ?? null);
        $signalement->setType($data['type'] ?? '');
        $signalement->setDateSign($data['dateSign'] ?? null);
        $signalement->setContenu($data['contenu'] ?? '');
        $signalement->setIdCompteSignale($data['idCompteSignale'] ?? null);
        $signalement->setIdCompte($data['idCompte'] ?? null);
        return $signalement;
    }

    public function hydrateAll(array $rows): array {
        $list = [];
        foreach ($rows as $row) {
            $list[] = $this->hydrate($row);
        }
        return $list;
    }
}
