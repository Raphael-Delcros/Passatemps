<?php
class Categorie {

// --- Attributs ---

    private ?int $idCategorie;
    private ?string $nom;

// --- Constucteur ---

    public function __construct(?int $id = null, ?string $n = null)
    {
        $this->idCategorie = $id;
        $this->nom = $n;
    }

 // --- Getters & Setters ---
    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setIdCategorie(?int $id): void
    {
        $this->idCategorie = $id;
    }
    public function setNom(?string $n): void
    {
        $this->nom = $n;
    }
}

?>