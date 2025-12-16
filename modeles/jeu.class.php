<?php

/**
 * @file jeu.class.php
 * @brief Définit la classe Jeu représentant un jeu de société.
 * 
 */

/**
 * @brief Classe représentant un jeu de société
 *
 */
class Jeu
{

    // --- Attributs ---

    private ?int $idJeu;
    private ?string $nom;
    private ?string $description;
    private ?string $contenu;
    private ?int $nbJoueursMin;
    private ?int $nbJoueursMax;
    private ?string $dateSortie;
    private ?int $idJeuPrincipal;
    private ?array $categories; // Récupérer les catégories via la table cataloguer
    private ?int $idPhoto;
    private ?string $urlPhoto;
    private ?int $dureePartie;

    /**
     * Constructeur de la classe Jeu
     *
     * @param integer $id Identifiant du jeu
     * @param string $nom Nom du jeu
     * @param string|null $description Description du jeu
     * @param string|null $contenu Contenu du jeu
     * @param integer|null $nbJoueursMin Nombre minimum de joueurs
     * @param integer|null $nbJoueursMax Nombre maximum de joueurs
     * @param string|null $dateSortie Date de sortie du jeu
     * @param integer|null $idJeuPrincipal Identifiant du jeu principal (si applicable)
     * @param integer|null $idPhoto Identifiant de la photo associée au jeu
     * @param integer|null $dureePartie Durée estimée d'une partie en minutes
     * @param string|null $urlPhoto URL de la photo associée au jeu
     * @param array|null $categories Catégories associées au jeu
     * @param integer|null $idCompteDestinataire Identifiant du compte destinataire
     */

    public function __construct(
        ?int $id,
        ?string $nom,
        ?string $desc = null,
        ?string $cont = null,
        ?int $nbMin = null,
        ?int $nbMax = null,
        ?string $dateSort = null,
        ?int $idJeuPrin = null,
        ?int $idPhoto = null,
        ?int $dureePartie = null,
        ?string $urlPhoto = null,
        ?array $categories = null
    ) {
        $this->idJeu = $id;
        $this->nom = $nom;
        $this->description = $desc;
        $this->contenu = $cont;
        $this->nbJoueursMin = $nbMin;
        $this->nbJoueursMax = $nbMax;
        $this->dateSortie = $dateSort;
        $this->idJeuPrincipal = $idJeuPrin;
        $this->categories = $categories;
        $this->idPhoto = $idPhoto;
        $this->dureePartie = $dureePartie;
        $this->urlPhoto = $urlPhoto;
    }


    // --- Getters & Setters ---


    /**
     * @brief Récupère la valeur de idJeu
     * 
     * @return integer L'identifiant du jeu
     */
    public function getIdJeu(): ?int{return $this->idJeu;}

    /**
     * Change la valeur de idJeu
     * 
     * @param integer $idJeu L'identifiant du jeu
     */
    public function setIdJeu(?int $idJeu): void{$this->idJeu = $idJeu;}

    /**
     * @brief Récupère la valeur du nom du jeu
     * 
     * @return string Le nom du jeu
     */
    public function getNom(): ?string{return $this->nom;}
    
    /**
     * @brief Change la valeur du nom du jeu
     * 
     * @param string $nom Le nom du jeu
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @brief Récupère la valeur de la description du jeu
     * 
     * @return string La description du jeu
     */
    public function getDescription(): ?string{return $this->description;}

    /**
     * @brief Change la valeur de la description du jeu
     * 
     * @param string $description La description du jeu
     */
    public function setDescription(?string $description): void{$this->description = $description;}

    /**
     * @brief Récupère la valeur du contenu du jeu
     * 
     * @return string Le contenu du jeu
     */
    public function getContenu(): ?string{return $this->contenu;}

    /**
     * @brief Change la valeur du contenu du jeu
     * 
     * @param string $contenu Le contenu du jeu
     */
    public function setContenu(?string $contenu): void{$this->contenu = $contenu;}

    /**
     * @brief Récupère la valeur du nombre minimum de joueurs
     * 
     * @return integer Le nombre minimum de joueurs
     */
    public function getNbJoueursMin(): ?int{return $this->nbJoueursMin;}

    /**
     * @brief Change la valeur du nombre minimum de joueurs
     * 
     * @param integer $nbJoueursMin Le nombre minimum de joueurs
     */
    public function setNbJoueursMin(?int $nbJoueursMin): void{$this->nbJoueursMin = $nbJoueursMin;}
    
    /**
     * @brief Récupère la valeur du nombre maximum de joueurs
     * 
     * @return integer Le nombre maximum de joueurs
     */
    public function getNbJoueursMax(): ?int{return $this->nbJoueursMax;}

    /**
     * @brief Change la valeur du nombre maximum de joueurs
     * 
     * @param integer $nbJoueursMax Le nombre maximum de joueurs
     */
    public function setNbJoueursMax(?int $nbJoueursMax): void{$this->nbJoueursMax = $nbJoueursMax;}

    /**
     * @brief Récupère la valeur de la date de sortie du jeu
     * 
     * @return string La date de sortie du jeu
     */
    public function getDateSortie(): ?string{return $this->dateSortie;}

    /**
     * @brief Change la valeur de la date de sortie du jeu
     * 
     * @param string $dateSortie La date de sortie du jeu
     */
    public function setDateSortie(?string $dateSortie): void{$this->dateSortie = $dateSortie;}

    /**
     * @brief Récupère la valeur de idJeuPrincipal
     * 
     * @return integer|null L'identifiant du jeu principal
     */
    public function getIdJeuPrincipal(): ?int{return $this->idJeuPrincipal;}

    /**
     * Change la valleur de idJeuPrincipal
     * 
     * @param integer|null $idJeuPrincipal L'identifiant du jeu principal
     */
    public function setIdJeuPrincipal(?int $idJeuPrincipal): void{$this->idJeuPrincipal = $idJeuPrincipal;}

    /**
     * @brief Récupère les catégories associées au jeu
     * 
     * @return array|null Les catégories du jeu
     */
    public function getCategories(): ?array{return $this->categories;}

    /**
     * Change les catégories associées au jeu
     * 
     * @param array|null $categories Les catégories du jeu
     */
    public function setCategories(?array $categories): void{$this->categories = $categories;}

    /**
     * @brief Récupère la valeur de idPhoto
     * 
     * @return integer|null L'identifiant de la photo
     */
    public function getIdPhoto(): ?int{return $this->idPhoto;}

    /**
     * Change la valleur de idPhoto
     * 
     * @param integer|null $idPhoto L'identifiant de la photo
     */
    public function setIdPhoto($idPhoto): void{$this->idPhoto = $idPhoto;}

    /**
     * @brief Récupère la valeur de dureePartie
     * 
     * @return integer|null La durée estimée d'une partie en minutes
     */
    public function getdureePartie(): ?int{return $this->dureePartie;}

    /**
     * Change la valleur de dureePartie
     * 
     * @param integer|null $dureePartie La durée estimée d'une partie en minutes
     */
    public function setdureePartie($dureePartie): void{$this->dureePartie = $dureePartie;}

    /**
     * @brief Récupère l'URL de la photo associée au jeu
     * 
     * @return string|null L'URL de la photo
     */
    public function getUrlPhoto(): ?string{return $this->urlPhoto;}

    /**
     * Change l'URL de la photo associée au jeu
     * 
     * @param string|null $urlPhoto L'URL de la photo
     */
    public function setUrlPhoto($urlPhoto): void{$this->urlPhoto = $urlPhoto;}
}
