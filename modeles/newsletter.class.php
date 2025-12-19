<?php
/**
 * @file newsletter.class.php
 * @brief Définit la classe Newsletter représentant la newsletter.
 * 
 */

/**
 * @brief Classe représentant la newsletter
 */
class Newsletter{
    // Attributs
    private ?int $idNewsletter;
    private ?string $email;

    // Constructeur
    /**
     * Constructeur de la classe Newsletter
     *
     * @param integer|null $idNewsletter Identifiant de la newsletter
     * @param string|null $email Email de la newsletter
     */
    public function __construct(?int $idNewsletter = null, ?string $email = null) {
        $this->idNewsletter = $idNewsletter;
        $this->email = $email;
    }

    // Getters et Setters

    /**
     * @brief Récupère la valeur de idNewsletter
     * 
     * @return integer|null L'identifiant de la newsletter
     */
    public function getIdNewsletter(): ?int
    {
        return $this->idNewsletter;
    }
    /**
     * Change la valeur de idNewsletter
     */
    public function setIdNewsletter(?int $idNewsletter): void
    {
        $this->idNewsletter = $idNewsletter;
    }
    

    /**
     * Récupère la valeur de email
     * 
     * @return string|null L'email de l'inscription à la newsletter
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Applique la valeur de email
     * 
     * @param string|null $email L'email de l'inscription à la newsletter
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}