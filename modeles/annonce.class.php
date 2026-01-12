<?php

/**
 * @file annonce.class.php
 * @brief Définit la classe Annonce représentant une annonce de vente de jeux.
 * 
 */

/**
 * @brief Classe représentant une annonce de vente de jeux
 */
class Annonce
{
    private ?int $idAnnonce;
    private ?string $titre;
    private ?string $description;
    private ?float $prix;
    private ?string $datePub;
    private ?string $etatJeu;
    private ?string $etatVente;
    private ?int $idJeu;
    private ?int $idCompteVendeur;
    private ?string $urlPhoto;

    /**
     * Constructeur de la classe Annonce
     *
     * @param integer|null $idAnnonce Identifiant de l'annonce
     * @param string|null $titre Titre de l'annonce
     * @param string|null $description Description de l'annonce
     * @param float|null $prix Prix de l'annonce
     * @param string|null $datePub Date de publication de l'annonce
     * @param string|null $etatJeu État du jeu dans l'annonce
     * @param string|null $etatVente État de vente de l'annonce
     * @param integer|null $idJeu Identifiant du jeu associé à l'annonce, vient de la table jeu
     * @param integer|null $idCompteVendeur Identifiant du compte vendeur, vient de la table compte
     * @param string|null $urlPhoto URL de la photo associée à l'annonce, vient de la table photo
     */
    public function __construct(
        ?int $idAnnonce = null,
        ?string $titre = null,
        ?string $description = null,
        ?float $prix = null,
        ?string $datePub = null,
        ?string $etatJeu = null,
        ?string $etatVente = null,
        ?int $idJeu = null,
        ?int $idCompteVendeur = null,
        ?string $urlPhoto = null
    ) {
        $this->idAnnonce = $idAnnonce;
        $this->titre = $titre;
        $this->description = $description;
        $this->prix = $prix;
        $this->datePub = $datePub;
        $this->etatJeu = $etatJeu;
        $this->etatVente = $etatVente;
        $this->idJeu = $idJeu;
        $this->idCompteVendeur = $idCompteVendeur;
        $this->urlPhoto = $urlPhoto;
    }

    // Getters et Setters

    /**
     * @brief Récupère la valeur de idAnonnce
     * 
     * @return integer|null L'identifiant de l'annonce
     */
    public function getIdAnnonce(): ?int
    {
        return $this->idAnnonce;
    }
    /**
     * change la valeur de idAnnonce
     *
     * @param integer|null $id
     * @return void
     */
    public function setIdAnnonce(?int $id): void
    {
        $this->idAnnonce = $id;
    }

    /**
     * Récupère la valeur de titre
     *
     * @return string|null
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }
    /**
     * Change la valeur de titre
     *
     * @param string|null $titre
     */
    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }
    /**
     * Récupère la valeur de description
     *
     * @return string|null
     */

    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Change la valeur de description
     *
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    /**
     * Récupère la valeur de prix
     *
     * @return float|null
     */
    public function getPrix(): ?float
    {
        return $this->prix;
    }
    /**
     * Change la valeur de prix
     *
     * @param float|null $prix
     */
    public function setPrix(?float $prix): void
    {
        $this->prix = $prix;
    }
    /**
     * Récupère la valeur de datePub
     *
     * @return string|null
     */
    public function getDatePub(): ?string
    {
        return $this->datePub;
    }
    /**
     * Change la valeur de datePub
     *
     * @param string|null $datePub
     */
    public function setDatePub(?string $datePub): void
    {
        $this->datePub = $datePub;
    }
    /**
     * Récupère la valeur de etatJeu
     *
     * @return string|null
     */
    public function getEtatJeu(): ?string
    {
        return $this->etatJeu;
    }
    /**
     * Change la valeur de etatJeu
     *
     * @param string|null $etatJeu
     */
    public function setEtatJeu(?string $etatJeu): void
    {
        $this->etatJeu = $etatJeu;
    }
    /**
     * Récupère la valeur de etatVente
     *
     * @return string|null
     */
    public function getEtatVente(): ?string
    {
        return $this->etatVente;
    }
    /**
     * Change la valeur de etatVente
     *
     * @param string|null $etatVente
     */
    public function setEtatVente(?string $etatVente): void
    {
        $this->etatVente = $etatVente;
    }
    /**
     * Récupère la valeur de idJeu
     *
     * @return integer|null
     */
    public function getIdJeu(): ?int
    {
        return $this->idJeu;
    }
    /**
     * Change la valeur de idJeu
     *
     * @param integer|null $idJeu
     */
    public function setIdJeu(?int $idJeu): void
    {
        $this->idJeu = $idJeu;
    }
    /**
     * Récupère la valeur de idCompteVendeur
     *
     * @return integer|null
     */
    public function getIdCompteVendeur(): ?int
    {
        return $this->idCompteVendeur;
    }
    /**
     * Change la valeur de idCompteVendeur
     *
     * @param integer|null $idCompteVendeur
     */
    public function setIdCompteVendeur(?int $idCompteVendeur): void
    {
        $this->idCompteVendeur = $idCompteVendeur;
    }

    /**
     * Récupère la valeur de urlPhoto
     *
     * @return string|null
     */
    public function getUrlPhoto(): ?string
    {
        return $this->urlPhoto;
    }

    /**
     * Change la valeur de urlPhoto
     *
     * @param string|null $urlPhoto
     */
    public function setUrlPhoto(?string $urlPhoto): void
    {
        $this->urlPhoto = $urlPhoto;
    }
}
