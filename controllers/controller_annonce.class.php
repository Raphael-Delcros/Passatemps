<?php 
/**
 * @file controller_annonce.class.php
 * @brief Définit la classe ControllerAnnonce pour gérer les actions liées aux annonces.
 * 
 */

/**
 * @brief Classe ControllerAnnonce pour gérer les actions liées aux annonces
 */
Class ControllerAnnonce extends controller {
    /**
     * Constructeur de la classe ControllerAnnonce
     *
     * @param Twig\Environment $twig Environnement Twig pour le rendu des templates
     * @param Twig\Loader\FilesystemLoader $loader Chargeur de fichiers Twig
     */
    public function __construct( Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    /**
     * Liste toutes les annonces et les affiche via un template Twig
     * 
     * @return void
     */
    public function lister()
    {
        $dao = new AnnonceDao($this->getPdo());
        $annonces = $dao->findAllAssoc();

        $template = $this->getTwig()->load('annonces.html.twig');
        echo $template->render([
        'annonces' => $annonces
        ]);
    }

    /**
     * Affiche une annonce spécifique basée sur son identifiant
     * 
     * @return void
     */
    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new AnnonceDao($this->getPdo());
        $annonce = $dao->find($id);

        $template = $this->getTwig()->load('annonce.html.twig');
        echo $template->render([
            'annonce' => $annonce,
        ]);
    }

    /**
     * Recherche des annonces basées sur un mot-clé fourni par l'utilisateur
     * 
     * @return void
     */
    public function rechercherAnnonces()
    {
        $q = $_GET['q'] ?? '';
        $dao = new AnnonceDao($this->getPdo());

        $annonces = ($q === '') ? [] : $dao->research($q);

        $template = $this->getTwig()->load('recherche.html.twig');
        echo $template->render([
            'q' => $q
        ]);
    }
}