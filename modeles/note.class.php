<?php

class Note {

    private ?int $note;
    private ?int $idCompteQuiNote;
    private ?int $idCompteNote;


    public function __construct(
        ?int $note = null, 
        ?string $idCompteQuiNote = null, 
        ?string $idCompteNote = null
    ) {
        $this->note = $note;
        $this->idCompteQuiNote = $idCompteQuiNote;
        $this->idCompteNote = $idCompteNote;
    }


    // Getters et Setters


    /**
     * @brief Récupère la valeur de contenu
     * 
     * @return int|null La note attribuee
     */
    public function getNote(): ?int
    {
        return $this->note;
    }

    /**
     * @brief Change la valeur de note
     * 
     * @param int|null La note attribuee
     */
    public function setNote(?int $note): void
    {
        $this->note = $note;

    }

    /**
     * @brief Récupère l'identifiant du compte qui a note
     * 
     * @return int|null La note attribuee
     */
    public function getIdCompteQuiNote(): ?int
    {
        return $this->idCompteQuiNote;
    }

    /**
     * @brief Change l'identifiant du compte qui a note
     * 
     * @param int|null La note attribuee
     */
    public function setIdCompteQuiNote(?int $idCompteQuiNote) : void
    {
        $this->idCompteQuiNote = $idCompteQuiNote;

    }

    /**
     * @brief Récupère l'identifiant du compte qui se fait note
     * 
     * @return int|null l'identifiant du compte qui se fait note
     */ 
    public function getIdCompteNote()
    {
        return $this->idCompteNote;
    }

    /**
     * Set the value of idCompteNote
     *
     * @return  self
     */ 
    public function setIdCompteNote($idCompteNote)
    {
        $this->idCompteNote = $idCompteNote;
    }

}
