<?php
class Jeu {
 
// --- Attributs ---

    private ?int $idJeu;
    private ?string $nom;
    private ?string $description;
    private ?string $contenu ;
    private ?int $nbJoueursMin ;
    private ?int $nbJoueursMax ; 
    private ?string $dateSortie ; 
    private ?int $idJeuPrincipal ;
    private ?array $categories; // Récupérer les catégories via la table cataloguer
    private ?int $idPhoto ;
    private ?string $urlPhoto ;
    private ?int $DureePartie ; 
    
// --- Constucteur ---

    public function __construct(?int $id = null, ?string $n = null, ?string $desc = null, ?string $cont = null, ?int $nbMin = null, ?int $nbMax = null,
    ?string $dateSort = null, ?int $idJeuPrin = null, ?int $idPhoto = null, ?int $DureePartie = null, ?string $urlPhoto = null, ?array $categories = null)
    {
        $this->idJeu = $id;
        $this->nom = $n;
        $this->description = $desc;
        $this->contenu = $cont;
        $this->nbJoueursMin = $nbMin;
        $this->nbJoueursMax = $nbMax;
        $this->dateSortie = $dateSort;
        $this->idJeuPrincipal = $idJeuPrin;
        $this->categories = $categories;
        $this->idPhoto = $idPhoto;
        $this->DureePartie = $DureePartie;
        $this->urlPhoto = $urlPhoto;
    }


 // --- Getters & Setters ---

    public function getIdJeu() : ?int
    {
        return $this->idJeu;
    }
    public function setIdJeu( ?int $idJeu) : void
    {
        $this->idJeu = $idJeu;
    }


    public function getNom() : ?string
    {
        return $this->nom;
    }
    public function setNom(?string $nom) : void
    {
        $this->nom = $nom;
    }


    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setDescription(?string $desciption) : void
    {
        $this->description = $desciption;
    }

    public function getContenu() : ?string
    {
        return $this->contenu;
    }
    public function setContenu(?string $contenu) : void
    {
        $this->contenu = $contenu;
    }


    public function getNbJoueursMin() : ?int
    {
        return $this->nbJoueursMin;
    }
    public function setNbJoueursMin(?int $nbJoueursMin) : void
    {
        $this->nbJoueursMin = $nbJoueursMin;
    }


    public function getNbJoueursMax() : ?int
    {
        return $this->nbJoueursMax;
    }
    public function setNbJoueursMax(?int $nbJoueursMax) : void
    {
        $this->nbJoueursMax = $nbJoueursMax;
    }

    public function getDateSortie() : ?string
    {
        return $this->dateSortie;
    }
    public function setDateSortie(?string $dateSortie) : void
    {
        $this->dateSortie = $dateSortie;
    }

    public function getIdJeuPrincipal() : ?int
    {
        return $this->idJeuPrincipal;
    }
    public function setIdJeuPrincipal(?int $idJeuPrincipal) : void
    {
        $this->idJeuPrincipal = $idJeuPrincipal;
    }


    public function getCategories() : ?array
    {
        return $this->categories;
    }
    public function setCategories(?array $categories) : void
    {
        $this->categories = $categories;
    }

    public function getIdPhoto() : ?int
    {
        return $this->idPhoto;
    }
    public function setIdPhoto($idPhoto) : void
    {
        $this->idPhoto = $idPhoto;
    }

    public function getDureePartie() : ?int
    {
        return $this->DureePartie;
    }
    public function setDureePartie($DureePartie) : void
    {
        $this->DureePartie = $DureePartie;
    }

    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    } 
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }
}

?>