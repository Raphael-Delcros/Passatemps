<?php

class Livraison
{

    // --- Attributs ---
    private ?int $idLivraison;
    private ?string $ville;
    private ?string $pays;
    private ?string $adresse;
    private ?string $codePostal;
    private ?string $dateCommande;
    private ?string $dateLivraison;
    private ?string $dateReception;
    private ?int $idAnnonce;
    private ?int $idCompteAcheteur;
    private ?string $numeroDeSuivi;

    // --- Constructeur ---
    public function __construct(
        ?int $idLivraison = null,
        ?string $ville = null,
        ?string $pays = null,
        ?string $adresse = null,
        ?string $codePostal = null,
        ?string $dateCommande = null,
        ?string $dateLivraison = null,
        ?string $dateReception = null,
        ?int $idAnnonce = null,
        ?int $idCompteAcheteur = null,
        ?string $numeroDeSuivi = null
    ) {
        $this->idLivraison = $idLivraison;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->dateLivraison = $dateLivraison;
        $this->dateReception = $dateReception;
        $this->idAnnonce = $idAnnonce;
        $this->idCompteAcheteur = $idCompteAcheteur;
        $this->numeroDeSuivi = $numeroDeSuivi;
    }

    // --- Getters & Setters ---

    /**
     * Get the value of idLivraison
     */
    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
    }

    /**
     * Set the value of idLivraison
     */
    public function setIdLivraison($idLivraison): void
    {
        $this->idLivraison = $idLivraison;
    }

    /**
     * Get the value of ville
     */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * Get the value of pays
     */
    public function getPays(): ?string
    {
        return $this->pays;
    }

    /**
     * Set the value of pays
     */
    public function setPays($pays): void
    {
        $this->pays = $pays;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * Get the value of codePostal
     */
    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     */
    public function setCodePostal($codePostal): void
    {
        $this->codePostal = $codePostal;

    }

     /**
     * Get the value of dateCommande
     */
    public function getDateCommande(): ?string
    {
        return $this->dateCommande;
    }

    /**
     * Set the value of dateCommande
     */
    public function setDateCommande($dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * Get the value of dateLivraison
     */
    public function getDateLivraison(): ?string
    {
        return $this->dateLivraison;
    }

    /**
     * Set the value of dateLivraison
     */
    public function setDateLivraison($dateLivraison): void
    {
        $this->dateLivraison = $dateLivraison;

    }

    /**
     * Get the value of dateReception
     */
    public function getDateReception(): ?string
    {
        return $this->dateReception;
    }

    /**
     * Set the value of dateReception
     */
    public function setDateReception($dateReception): void
    {
        $this->dateReception = $dateReception;

    }

    /**
     * Get the value of idAnnonce
     */
    public function getIdAnnonce(): ?int
    {
        return $this->idAnnonce;
    }

    /**
     * Set the value of idAnnonce
     */
    public function setIdAnnonce($idAnnonce): void
    {
        $this->idAnnonce = $idAnnonce;

    }

    /**
     * Get the value of idCompteAcheteur
     */
    public function getIdCompteAcheteur(): ?int
    {
        return $this->idCompteAcheteur;
    }

    /**
     * Set the value of idCompteAcheteur
     */
    public function setIdCompteAcheteur($idCompteAcheteur): void
    {
        $this->idCompteAcheteur = $idCompteAcheteur;

    }

    /**
     * Get the value of numeroDeSuivi
     */
    public function getNumeroDeSuivi(): ?string
    {
        return $this->numeroDeSuivi;
    }

    /**
     * Set the value of numeroDeSuivi
     */
    public function setNumeroDeSuivi($numeroDeSuivi): void
    {
        $this->numeroDeSuivi = $numeroDeSuivi;

    }
}
