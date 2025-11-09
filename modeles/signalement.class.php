<?php

class Signalement {
    private ?int $idSign;
    private string $type;
    private ?string $dateSign;
    private string $contenu;
    private ?int $idCompteSignale;
    private ?int $idCompte;

    public function __construct(
        ?int $idSign = null,
        string $type = '',
        ?string $dateSign = null,
        string $contenu = '',
        ?int $idCompteSignale = null,
        ?int $idCompte = null
    ) {
        $this->idSign = $idSign;
        $this->type = $type;
        $this->dateSign = $dateSign;
        $this->contenu = $contenu;
        $this->idCompteSignale = $idCompteSignale;
        $this->idCompte = $idCompte;
    }
    // --- Getters & Setters ---
    public function getIdSign(): ?int { return $this->idSign; }
    public function setIdSign(?int $idSign): void { $this->idSign = $idSign; }

    public function getType(): string { return $this->type; }
    public function setType(string $type): void { $this->type = $type; }

    public function getDateSign(): ?string { return $this->dateSign; }
    public function setDateSign(?string $dateSign): void { $this->dateSign = $dateSign; }

    public function getContenu(): string { return $this->contenu; }
    public function setContenu(string $contenu): void { $this->contenu = $contenu; }

    public function getIdCompteSignale(): ?int { return $this->idCompteSignale; }
    public function setIdCompteSignale(?int $id): void { $this->idCompteSignale = $id; }

    public function getIdCompte(): ?int { return $this->idCompte; }
    public function setIdCompte(?int $id): void { $this->idCompte = $id; }
}
