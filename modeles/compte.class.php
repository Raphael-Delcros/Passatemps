<?php

class Compte {
    private ?int $idCompte;
    private ?string $nom;
    private ?string $prenom;
    private ?string $email;
    private ?string $motDePasseHache;
    private ?string $dateInscription;
    private ?float $note;
    private ?string $role;
    // private int $tentativesEchouees = 0;              // Nombre de tentatives échouées
    // private ?string $dateDernierEchec = null; // Date et heure du dernier échec de connexion
    private string $statutCompte = 'actif';           // Statut du compte (actif ou désactivé)

    public function __construct(
        ?int $idCompte = null,
        ?string $nom = null,
        ?string $prenom = null,
        ?string $email = null,
        ?string $motDePasseHache = null,
        ?string $dateInscription = null,
        ?float $note = null,
        ?string $role = null,
        ?string $statutCompte = null
    ) {
        $this->idCompte = $idCompte;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasseHache = $motDePasseHache;
        $this->dateInscription = $dateInscription;
        $this->note = $note;
        $this->role = $role;
    }

    // --- Getters & Setters ---
    public function getIdCompte(): ?int { return $this->idCompte; }
    public function setIdCompte(?int $id): void { $this->idCompte = $id; }

    public function getNom(): ?string { return $this->nom; }
    public function setNom(?string $nom): void { $this->nom = $nom; }

    public function getPrenom(): ?string { return $this->prenom; }
    public function setPrenom(?string $prenom): void { $this->prenom = $prenom; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): void { $this->email = $email; }

    public function getMotDePasseHache(): ?string { return $this->motDePasseHache; }
    public function setMotDePasseHache(?string $mdp): void { $this->motDePasseHache = $mdp; }

    public function getDateInscription(): ?string { return $this->dateInscription; }
    public function setDateInscription(?string $date): void { $this->dateInscription = $date; }

    public function getNote(): ?float { return $this->note; }
    public function setNote(?float $note): void { $this->note = $note; }

    public function getRole(): ?string { return $this->role; }
    public function setRole(?string $role): void { $this->role = $role; }

}
