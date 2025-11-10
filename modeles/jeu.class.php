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
    private ?int $idJeuPrincipale ;
    private ?array $categories ; // Récupérer les catégories via la table cataloguer

    
// --- Constucteur ---

    public function __construct(?int $id = null, ?string $n = null, ?string $desc = null, ?string $cont = null, ?int $nbMin = null, ?int $nbMax = null, ?string $dateSort = null, ?int $idJeuPrin = null)
    {
        $this->idJeu = $id;
        $this->nom = $n;
        $this->description = $desc;
        $this->contenu = $cont;
        $this->nbJoueursMin = $nbMin;
        $this->nbJoueursMax = $nbMax;
        $this->dateSortie = $dateSort;
        $this->idJeuPrincipale = $idJeuPrin;
    }


 // --- Getters & Setters ---

    public function getIdJeu() : ?int
    {
        return $this->idJeu;
    }
    public function setIdJeu($idJeu) : void
    {
        $this->idJeu = $idJeu;
    }


    public function getNom() : ?string
    {
        return $this->nom;
    }
    public function setNom($nom) : void
    {
        $this->nom = $nom;
    }


    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setDescription($desciption) : void
    {
        $this->description = $desciption;
    }

    public function getContenu() : ?string
    {
        return $this->contenu;
    }
    public function setContenu($contenu) : void
    {
        $this->contenu = $contenu;
    }


    public function getNbJoueursMin() : ?int
    {
        return $this->nbJoueursMin;
    }
    public function setNbJoueursMin($nbJoueursMin) : void
    {
        $this->nbJoueursMin = $nbJoueursMin;
    }


    public function getNbJoueursMax() : ?int
    {
        return $this->nbJoueursMax;
    }
    public function setNbJoueursMax($nbJoueursMax) : void
    {
        $this->nbJoueursMax = $nbJoueursMax;
    }

    public function getDateSortie() : ?string
    {
        return $this->dateSortie;
    }
    public function setDateSortie($dateSortie) : void
    {
        $this->dateSortie = $dateSortie;
    }

    public function getIdJeuPrincipale() : ?int
    {
        return $this->idJeuPrincipale;
    }
    public function setIdJeuPrincipale($idJeuPrincipale) : void
    {
        $this->idJeuPrincipale = $idJeuPrincipale;
    }
}

?>