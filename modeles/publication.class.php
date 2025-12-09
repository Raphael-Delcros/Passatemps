<?php 
class Publication{
    //--- Attributs ---
    private?int $idPost;
    private?string $sujet;
    private?string $dateEnvoi;
    private?string $contenu;
    private ?int $idPostPrincipale = null;
    private ?int $idCompte = null;
    

    //--- Constructeur ---
    /**
     * Constructor
     * @param ?int $idPost
     * @param ?string $sujet
     * @param ?string $contenu
     * @param ?string $datePublication
     * @param ?int $idPostPrincipale vide si la publication n'est pas un commentaire d'une autre publication
     * @param ?int $idCompte id du compte ayant posté la publication
     */
        public function __construct(
        ?int $idPost = null,
        ?string $sujet = null,
        ?string $contenu = null,
        ?string $envoi = null,
        ?int $idPostPrincipale = null)
    {
        $this->idPost = $idPost;
        $this->sujet = $sujet;
        $this->contenu = $contenu;
        $this->dateEnvoi = $envoi;
        $this->idPostPrincipale = $idPostPrincipale;
    }

    // --- Getters & Setters ---
    public function getIdPost(): ?int {
        return $this->idPost;
    }
    public function setIdPost(?int $idPost): void {
        $this->idPost = $idPost;
    }   
    public function getSujet(): ?string {
        return $this->sujet;
    }
    public function setSujet(?string $sujet): void {
        $this->sujet = $sujet;
    }
    public function getContenu(): ?string {
        return $this->contenu;
    }
    public function setContenu(?string $contenu): void {
        $this->contenu = $contenu;
    }

    /**
     * Récupere la valeur d'idPostPrincipale
     */ 
    public function getIdPostPrincipale() : ?int
    {
        return $this->idPostPrincipale;
    }

    /**
     * Set la valeur d'idPostPrincipale
     */ 
    public function setIdPostPrincipale($idPostPrincipale) : void
    {
        $this->idPostPrincipale = $idPostPrincipale;
    }

    /**
     * récupere la valeur d'idCompte
     */ 
    public function getIdCompte()
    {
        return $this->idCompte;
    }

    /**
     * Set la valeur d'idCompte
     */ 
    public function setIdCompte($idCompte)
    {
        $this->idCompte = $idCompte;

        return $this;
    }

    /**
     * Get the value of dateEnvoi
     */ 
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }

    /**
     * Set the value of dateEnvoi
     *
     */ 
    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }
}