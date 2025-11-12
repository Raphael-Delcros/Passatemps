<?php
class Bannissement{
    //--- Attributs ---
    private?int $idBannissement;
    private?int $idBanni;
    private?int $idBannisseur;
    private?string $dateDeb;
    private?string $dateFin;
    private?string $sujet;
    private?string $raison;

    //--- Constructeur ---
    public function __construct(
        ?int $idBannissement = null,
        ?int $idBanni = null,
        ?int $idBannisseur = null,
        ?string $dateDeb = null,
        ?string $dateFin = null,
        ?string $sujet = null,
        ?string $raison = null,
    ) {
        $this->idBannissement = $idBannissement;
        $this->idBanni = $idBanni;
        $this->idBannisseur = $idBannisseur;
        $this->dateDeb = $dateDeb;
        $this->dateFin = $dateFin;
        $this->sujet = $sujet;
        $this->raison = $raison;
    }

    // --- Getters & Setters ---
    public function getIdBannissement(): ?int {
        return $this->idBannissement;
    }
    public function setIdBannissement(?int $idBannissement): void {
        $this->idBannissement = $idBannissement;
    }
    public function getIdBanni(): ?int {
        return $this->idBanni;
    }
    public function setIdBanni(?int $idBanni): void {
        $this->idBanni = $idBanni;
    }
    public function getIdBannisseur(): ?int {
        return $this->idBannisseur;
    }
    public function setIdBannisseur(?int $idBannisseur): void {
        $this->idBannisseur = $idBannisseur;
    }
    public function getDateDeb(): ?string {
        return $this->dateDeb;
    }
    public function setDateDeb(?string $dateDeb): void {
        $this->dateDeb = $dateDeb;
    }
    public function getDateFin(): ?string {
        return $this->dateFin;
    }
    public function setDateFin(?string $dateFin): void {
        $this->dateFin = $dateFin;
    }
    public function getSujet(): ?string {
        return $this->sujet;
    }
    public function setSujet(?string $sujet): void {
        $this->sujet = $sujet;
    }
    public function getRaison(): ?string {
        return $this->raison;
    }
    public function setRaison(?string $raison): void {
        $this->raison = $raison;
    }


}