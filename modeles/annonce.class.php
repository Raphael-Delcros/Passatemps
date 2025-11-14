<?php 

Class Annonce {
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
    public function getIdAnnonce(): ?int { 
        return $this->idAnnonce; 
    }

    public function setIdAnnonce(?int $id): void { 
        $this->idAnnonce = $id; 
    }

    public function getTitre(): ?string { 
        return $this->titre; 
    }

    public function setTitre(?string $titre): void {
         $this->titre = $titre; 
    }

    public function getDescription(): ?string { 
        return $this->description; 
    }
    public function setDescription(?string $description): void { 
        $this->description = $description; 
    }

    public function getPrix(): ?float { 
        return $this->prix; 
    }
    public function setPrix(?float $prix): void { 
        $this->prix = $prix; 
    }

    public function getDatePub(): ?string { 
        return $this->datePub; 
    }
    public function setDatePub(?string $datePub): void { 
        $this->datePub = $datePub; 
    }

    public function getEtatJeu(): ?string { 
        return $this->etatJeu; 
    }
    public function setEtatJeu(?string $etatJeu): void { 
        $this->etatJeu = $etatJeu; 
    }

    public function getEtatVente(): ?string { 
        return $this->etatVente; 
    }
    public function setEtatVente(?string $etatVente): void { 
        $this->etatVente = $etatVente; 
    }

    public function getIdJeu(): ?int { 
        return $this->idJeu; 
    }
    public function setIdJeu(?int $idJeu): void { 
        $this->idJeu = $idJeu; 
    }

    public function getIdCompteVendeur(): ?int { 
        return $this->idCompteVendeur; 
    }
    public function setIdCompteVendeur(?int $idCompteVendeur): void { 
        $this->idCompteVendeur = $idCompteVendeur; 
    }

    public function getUrlPhoto(): ?string {
        return $this->urlPhoto;
    }

    public function setUrlPhoto(?string $urlPhoto): void {
        $this->urlPhoto = $urlPhoto;
    }
    
}
