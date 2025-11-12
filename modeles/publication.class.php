<?php 
class Publication{
    //--- Attributs ---
    private?int $idPost;
    private?string $sujet;
    private?string $contenu;
    private?string $datePublication;

    //--- Constructeur ---
    public function __construct(
        ?int $idPost = null,
        ?string $sujet = null,
        ?string $contenu = null,
        ?string $datePublication = null,
    ) {
        $this->idPost = $idPost;
        $this->sujet = $sujet;
        $this->contenu = $contenu;
        $this->datePublication = $datePublication;
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
    public function getDatePublication(): ?string {
        return $this->datePublication;
    }
    public function setDatePublication(?string $datePublication): void {
        $this->datePublication = $datePublication;
    }
}