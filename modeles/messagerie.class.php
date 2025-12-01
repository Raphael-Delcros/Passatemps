<?php
/**
 * @file messagerie.class.php
 * @brief Définit la classe Messagerie représentant un message entre utilisateurs.
 * 
 */

/**
 * @brief Classe représentant un message entre utilisateurs
 */
class Messagerie{
    // Attributs
    private ?int $idMessage;
    private ?string $contenu;
    private ?string $dateEnvoi;
    private ?int $idCompteExpediteur;
    private ?int $idCompteDestinataire;

    // Constructeur
    /**
     * Constructeur de la classe Messagerie
     *
     * @param integer|null $idMessage Identifiant du message
     * @param string|null $contenu Contenu du message
     * @param string|null $dateEnvoi Date d'envoi du message
     * @param integer|null $idCompteExpediteur Identifiant du compte expéditeur
     * @param integer|null $idCompteDestinataire Identifiant du compte destinataire
     */
    public function __construct(?int $idMessage = null, ?string $contenu = null, ?string $dateEnvoi = null, ?int $idCompteExpediteur = null, ?int $idCompteDestinataire = null) {
        $this->idMessage = $idMessage;
        $this->contenu = $contenu;
        $this->dateEnvoi = $dateEnvoi;
        $this->idCompteExpediteur = $idCompteExpediteur;
        $this->idCompteDestinataire = $idCompteDestinataire;
    }

    // Getters et Setters

    /**
     * @brief Récupère la valeur de idMessage
     * 
     * @return integer|null L'identifiant du message
     */
    public function getIdMessage(): ?int
    {
        return $this->idMessage;
    }

    /**
     * Change la valleur de idMessage
     * 
     * @param integer|null $idMessage L'identifiant du message
     */
    public function setIdMessage(?int $idMessage): void
    {
        $this->idMessage = $idMessage;

    }

    /**
     * @brief Récupère la valeur de contenu
     * 
     * @return string|null Le contenu du message
     */
    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    /**
     * @brief Change la valeur de contenu
     * 
     * @param string|null Contenu du message
     */
    public function setContenu(?string $contenu): void
    {
        $this->contenu = $contenu;

    }

    /**
     * @brief Récupère la valeur de dateEnvoi
     * 
     * @return string|null Date où le message à été envoyé
     */
    public function getDateEnvoi(): ?string
    {
        return $this->dateEnvoi;
    }

    /**
     * @brief Change la valeur de dateEnvoi
     * 
     * @param string|null $dateEnvoi Date où le message à été envoyé
     */
    public function setDateEnvoi(?string $dateEnvoi): void
    {
        $this->dateEnvoi = $dateEnvoi;

    }

    /**
     * @brief Récupère la valeur de idCompteExpediteur
     * 
     * @return integer|null L'identifiant du compte expéditeur
     */
    public function getIdCompteExpediteur(): ?int
    {
        return $this->idCompteExpediteur;
    }

    /**
     * @brief Change la valeur de idCompteExpediteur
     * 
     * @param integer|null $idCompteExpediteur L'identifiant du compte expéditeur
     */
    public function setIdCompteExpediteur($idCompteExpediteur): void
    {
        $this->idCompteExpediteur = $idCompteExpediteur;

    }

    /**
     * @brief Récupère la valeur de idCompteDestinataire
     * 
     * @return integer|null L'identifiant du compte destinataire
     */
    public function getIdCompteDestinataire(): ?int
    {
        return $this->idCompteDestinataire;
    }

    /**
     * @brief Change la valeur de idCompteDestinataire
     * 
     * @param integer|null $idCompteDestinataire L'identifiant du compte destinataire
     */
    public function setIdCompteDestinataire($idCompteDestinataire): void
    {
        $this->idCompteDestinataire = $idCompteDestinataire;

    }
}