<?php

class ControllerJeu extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    // Liste tous les Jeux
    public function lister() {
    $dao = new JeuDao($this->getPdo());
    $jeux = $dao->findAllAssoc(); // récupère tous les jeux en tableau associatif

    $template = $this->getTwig()->load('jeux.html.twig');
    echo $template->render([
        'jeux' => $jeux,
    ]);
    }

    // Affiche un seul jeu
    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new JeuDao($this->getPdo());
        $jeu = $dao->find($id);

        $template = $this->getTwig()->load('jeu.html.twig');
        echo $template->render([
            'jeu' => $jeu,
        ]);
    }
}
