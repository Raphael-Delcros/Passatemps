<?php

class ControllerVendre extends controller
{
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    public function creer()
    {
        $template = $this->getTwig()->load('vendre.html.twig');
        echo $template->render();
    }

    public function confirmerVente()
    {
        $data = $_POST;

        $date = getdate();
        $stringdate =  $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];

        $dao = new AnnonceDao($this->getPdo());
        $idAnnonce = $dao->lastId();

        $annonce = new Annonce(
        $idAnnonce,
        $data['titre'] ,
        $data['description'] ,
        $data['prix'] ,
        $stringdate,
        $data['etatJeu'] ,
        'en Vente', //etatVente
        $data['idJeu'] ,
        1             // idCompteVendeur → à remplacer plus tard
    );
        //à changer IdCompteVendeur quand les comptes seront faits
        //Faire id jeu quand la recherche et la récupération d'id serai faite

        $result = $dao->InsertInto($annonce);
        $template = $this->getTwig()->load('confirmation.html.twig');
        echo $template->render([
            'success' => $result
        ]);
    }

    public function recap()
    {
        // On récupère tout le formulaire
        $data = $_POST;

        // On envoie à Twig pour affichage du résumé
        $template = $this->getTwig()->load('recapVente.html.twig');
        echo $template->render([
            'annonce' => $data
        ]);
    }
}
