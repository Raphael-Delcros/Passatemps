<?php

class Messagerie{
    // Attributs
    private ?int $idMessage;
    private ?int $contenu;
    private ?string $dateEnvoi;
    private ?int $idCompteExpediteur;
    private ?int $idCompteDestinataire;

    // Constructeur
    public function __construct(?int $idMessage = null, ?int $contenu = null, ?string $dateEnvoi = null, ?int $idCompteExpediteur = null, ?int $idCompteDestinataire = null) {
        $this->idMessage = $idMessage;
        $this->contenu = $contenu;
        $this->dateEnvoi = $dateEnvoi;
        $this->idCompteExpediteur = $idCompteExpediteur;
        $this->idCompteDestinataire = $idCompteDestinataire;
    }

    // Getters et Setters

    /**
     * Get the value of idMessage
     */
    public function getIdMessage(): ?int
    {
        return $this->idMessage;
    }

    /**
     * Set the value of idMessage
     *
     */
    public function setIdMessage($idMessage): void
    {
        $this->idMessage = $idMessage;

    }

    /**
     * Get the value of contenu
     */
    public function getContenu(): ?int
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     */
    public function setContenu($contenu): void
    {
        $this->contenu = $contenu;

    }

    /**
     * Get the value of dateEnvoi
     */
    public function getDateEnvoi(): ?string
    {
        return $this->dateEnvoi;
    }

    /**
     * Set the value of dateEnvoi
     */
    public function setDateEnvoi($dateEnvoi): void
    {
        $this->dateEnvoi = $dateEnvoi;

    }

    /**
     * Get the value of idCompteExpediteur
     */
    public function getIdCompteExpediteur(): ?int
    {
        return $this->idCompteExpediteur;
    }

    /**
     * Set the value of idCompteExpediteur
     */
    public function setIdCompteExpediteur($idCompteExpediteur): void
    {
        $this->idCompteExpediteur = $idCompteExpediteur;

    }

    /**
     * Get the value of idCompteDestinataire
     */
    public function getIdCompteDestinataire(): ?int
    {
        return $this->idCompteDestinataire;
    }

    /**
     * Set the value of idCompteDestinataire
     */
    public function setIdCompteDestinataire($idCompteDestinataire): void
    {
        $this->idCompteDestinataire = $idCompteDestinataire;

    }
}