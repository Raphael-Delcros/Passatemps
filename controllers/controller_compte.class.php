<?php

class ControllerCompte extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    // Liste tous les comptes
    public function lister() {
    $dao = new CompteDao($this->getPdo());
    $comptes = $dao->findAllAssoc(); // récupère tous les comptes en tableau associatif

    $template = $this->getTwig()->load('comptes.html.twig');
    echo $template->render([
        'comptes' => $comptes,
    ]);
    }

    // Affiche un seul compte
    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new CompteDao($this->getPdo());
        var_dump($id);
        $compte = $dao->find($id);

        $template = $this->getTwig()->load('compte.html.twig');
        echo $template->render([
            'compte' => $compte,
        ]);
    }
    /**
     * @brief Affiche la page de connexion
     *
     * @return void
     */
    public function connexion() {
        $template = $this->getTwig()->load('connexion.html.twig');
        echo $template->render();
    }
    
    /**
     * @brief Affiche la page d'inscription
     *
     * @return void
     */
    public function inscription() {
        $template = $this->getTwig()->load('inscription.html.twig');
        echo $template->render();
    }
    
    /**
     * @brief Affiche la page de mot de passe oublié
     *
     * @bug Dans mdpOublie.html.twig, le footer est sur-élevé
     * @return void
     */
    public function mdpOublie() {
        $template = $this->getTwig()->load('mdpOublie.html.twig');
        echo $template->render();
    }
}
