<?php

class ControllerLivraison extends Controller
{
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    public function afficher()
    {
         $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new LivraisonDao($this->getPdo());
        $commande = $dao->find($id);

        $template = $this->getTwig()->load('livraison.html.twig');
        echo $template->render([
            'commande' => $commande,
        ]);
    }

    public function lister()
    {
        $dao = new LivraisonDao($this->getPdo());
        $commandes = $dao->findAllAssoc(); // récupère toutes le commandes en tableau associatif


        $template = $this->getTwig()->load('livraisons.html.twig');
        echo $template->render([
            'commandes' => $commandes,
        ]);
    }
}