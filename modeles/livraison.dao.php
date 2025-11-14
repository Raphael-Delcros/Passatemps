<?php

class LivraisonDao {

    private ?PDO $pdo;

    public function __construct(?PDO $pdo=null){
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

        public function find(?int $id): ?Livraison
        {
            $sql = "SELECT * FROM ". PREFIXE_TABLE. "livraison WHERE idLivraison = :id";
            $pdoStatement = $this->pdo->prepare($sql);
            $pdoStatement->execute(array("id"=>$id));
            $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Livraison');
            $commande = $pdoStatement->fetch();
            return $commande;
        }

        public function findAllAssoc(): array
        {
            $sql = "SELECT * FROM ". PREFIXE_TABLE. "livraison";
            $pdoStatement = $this->pdo->prepare($sql);
            $pdoStatement->execute();
            $commandes = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            return $commandes;
        }

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

        public function hydrateAll(array $dataArray): array
        {
            $commandes = [];
            foreach ($dataArray as $data) {
                $commandes[] = $this->hydrate($data);
            }
            return $commandes;
        }

        public function getTitreAnnonceByLivraisonId(int $idLivraison): ?array
        {
            $sql = "SELECT a.titre, a.prix FROM ". PREFIXE_TABLE. "annonce a
                    JOIN ". PREFIXE_TABLE. "livraison l ON a.idAnnonce = l.idAnnonce
                    WHERE l.idLivraison = :idLivraison";
            $pdoStatement = $this->pdo->prepare($sql);
            $pdoStatement->execute(array("idLivraison" => $idLivraison));
            $pdoStatement->setFetchMode(PDO::FETCH_ASSOC);
            $annonce = $pdoStatement->fetch();
            return $annonce;
        }

}