<?php
class Categorie {
    private ?int $idCategorie;
    private ?string $nom;

    public function __construct(?int $id = null, ?string $n = null)
    {
        $this->idCategorie = $id;
        $this->nom = $n;
    }

    /**  
     * Get the value of idCategorie
     * **/
    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    /**  
     * Get the value of nom
     * **/
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**  
     * Set the value of idCategorie
     * **/
    public function setIdCategorie(?int $id): void
    {
        $this->idCategorie = $id;
    }

    /**  
     * Set the value of nom
     * **/
    public function setNom(?string $n): void
    {
        $this->nom = $n;
    }
    
}

?>