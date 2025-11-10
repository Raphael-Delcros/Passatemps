<?php
class Cataloguer {

// --- Attributs ---

    private ?int $idJeu;
    private ?int $idCategorie;

// --- Constucteur ---

    public function __construct(?int $idj = null, ?string $idc = null)
    {
        $this->idJeu = $idj;
        $this->idCategorie = $idc;
    }

// --- Getters & Setters ---

    public function getIdJeu()
    {
        return $this->idJeu;
    }
    public function setIdJeu($idJeu)
    {
        $this->idJeu = $idJeu;
    }

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
    }
}

?>