<?php
/**
 * @file livraison.class.php
 * @brief Gère les paramètres d'une livraison.
 */


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
    private ?string $status;

    // --- Constructeur ---
    /**
     * Constructeur de Livraison
     *
     * @param integer|null $idLivraison Identifiant de la livraison
     * @param string|null $ville Ville de livraison
     * @param string|null $pays Pays de livraison
     * @param string|null $adresse Adresse de livraison
     * @param string|null $codePostal Code postal de livraison
     * @param string|null $dateCommande Date de la commande
     * @param string|null $dateLivraison Date où le paquet à été expédié
     * @param string|null $dateReception Date de réception
     * @param integer|null $idAnnonce Identifiant de l'annonce
     * @param integer|null $idCompteAcheteur Identifiant du compte acheteur
     * @param string|null $numeroDeSuivi Numéro de suivi de la livraison
     * @param string|null $status Statut de la livraison
     */
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
        ?string $numeroDeSuivi = null,
        ?string $status = null
    ) {
        $this->idLivraison = $idLivraison;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->dateCommande = $dateCommande;
        $this->dateLivraison = $dateLivraison;
        $this->dateReception = $dateReception;
        $this->idAnnonce = $idAnnonce;
        $this->idCompteAcheteur = $idCompteAcheteur;
        $this->numeroDeSuivi = $numeroDeSuivi;
        $this->status = $status;
    }

    // --- Getters & Setters ---

    /**
     * Récupère la valeur de idLivraison.
     *
     * @return integer|null
     */
    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
    }

    /**
     * Change la valeur de idLivraison.
     *
     * @param int|null $idLivraison
     * @return void
     */
    public function setIdLivraison(?int $idLivraison): void
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
    public function setVille(?string $ville): void
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
    public function setPays(?string $pays): void
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
    public function setAdresse(?string $adresse): void
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
     * Change la valeur de codePostal.
     *
     * @param string $codePostal Le code postal à définir.
     * @return void
     */
    public function setCodePostal(?string $codePostal): void
    {
        $this->codePostal = $codePostal;

    }

     /**
      * Récupère la valeur de dateCommande.
      *
      * @return string|null
      */
    public function getDateCommande(): ?string
    {
        return $this->dateCommande;
    }

    /**
     * Change la valeur de dateCommande.
     *
     * @param  $dateCommande
     * @return void
     */
    public function setDateCommande(?string $dateCommande): void
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * Récupère la valeur de dateLivraison.
     *
     * @return string|null
     */
    public function getDateLivraison(): ?string
    {
        return $this->dateLivraison;
    }

    /**
     * Change la valeur de dateLivraison.
     *
     * @param string|null $dateLivraison
     * @return void
     */
    public function setDateLivraison(?string $dateLivraison): void
    {
        $this->dateLivraison = $dateLivraison;

    }

    /**
     * Récupère la valeur de dateReception.
     *
     * @return string|null
     */
    public function getDateReception(): ?string
    {
        return $this->dateReception;
    }

    /**
     * Change la valeur de dateReception.
     *
     * @param string|null $dateReception
     * @return void
     */
    public function setDateReception(?string $dateReception): void
    {
        $this->dateReception = $dateReception;

    }

    /**
     * Récupère la valeur de idAnnonce.
     *
     * @return integer|null
     */
    public function getIdAnnonce(): ?int
    {
        return $this->idAnnonce;
    }

    /**
     * Change la valeur de idAnnonce
     *
     * @param integer|null $idAnnonce
     * @return void
     */
    public function setIdAnnonce(?int $idAnnonce): void
    {
        $this->idAnnonce = $idAnnonce;

    }

    /**
     * Récupère la valeur de idCompteAcheteur.
     *
     * @return integer|null
     */
    public function getIdCompteAcheteur(): ?int
    {
        return $this->idCompteAcheteur;
    }

    /**
     * Change la valeur de idCompteAcheteur.
     *
     * @param integer|null $idCompteAcheteur
     * @return void
     */
    public function setIdCompteAcheteur(?int $idCompteAcheteur): void
    {
        $this->idCompteAcheteur = $idCompteAcheteur;

    }

    /**
     * Rrécupère la valeur de numeroDeSuivi
     *
     * @return string|null
     */
    public function getNumeroDeSuivi(): ?string
    {
        return $this->numeroDeSuivi;
    }

    /**
     * Change la valeur de numeroDeSuivi
     *
     * @param string|null $numeroDeSuivi
     * @return void
     */
    public function setNumeroDeSuivi(?string $numeroDeSuivi): void
    {
        $this->numeroDeSuivi = $numeroDeSuivi;

    }

    /**
     * Récupère la valeur de status.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Change la valeur de status.
     *
     * @param string|null $status
     * @return void
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }
}
