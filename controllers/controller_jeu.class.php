<?php

class ControllerJeu extends Controller
{
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    // Liste tous les Jeux
    public function lister()
    {
        $dao = new JeuDao($this->getPdo());
        $jeux = $dao->findAllAssoc(); // récupère tous les jeux en tableau associatif

        $template = $this->getTwig()->load('jeux.html.twig');
        echo $template->render([
            'jeux' => $jeux,
        ]);
    }

    // Affiche un seul jeu
    public function afficher()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new JeuDao($this->getPdo());
        $jeu = $dao->find($id);

        $template = $this->getTwig()->load('jeu.html.twig');
        echo $template->render([
            'jeu' => $jeu,
        ]);
    }

    public function autocomplete()
    {
        $q = $_GET['q'] ?? '';
        $dao = new JeuDao($this->getPdo());

        if ($q === '') {
            echo json_encode([]);
            exit;
        }

        $jeux = $dao->rechercherParNom($q); // retourne un tableau associatif

        // On envoie seulement les infos utiles
        $resultats = array_map(function ($jeu) {
            return [
                'idJeu' => $jeu['idJeu'],
                'nom' => $jeu['nom'],
            ];
        }, $jeux);

        header('Content-Type: application/json');
        echo json_encode($resultats);
        exit;
    }
}
