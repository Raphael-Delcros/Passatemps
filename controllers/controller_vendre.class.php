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
        // bla bla bla faut faire le formulaire bouh bouh créer une annonce tout ca tout ca
        extract($_GET,EXTR_OVERWRITE);
       // Logique pour confirmer la vente (par exemple, enregistrer les données dans la base de données)
        $template = $this->getTwig()->load('vendre.html.twig');
        echo $template->render();

        $date= getdate();
        $stringdate =  $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        
        $dao = new AnnonceDao($this->getPdo());
        $idAnnonce = $dao->lastId();

        $annonce = new Annonce(
            $idAnnonce,
            $_GET['titre'],
            $_GET['description'],
            $_GET['prix'],
            $stringdate,
            $_GET['etatJeu'],
            'en Vente',
            $_GET['idJeu'],
            1             // idCompteVendeur → à remplacer plus tard
            
        );
        //à changer IdCompteVendeur quand les comptes seront faits
        //Faire id jeu quand la recherche et la récupération d'id serai faite

        $result = $dao->InsertInto($annonce);
        if ($result) {
            echo "Annonce insérée avec succès.";
        } else {
            echo "Erreur lors de l'insertion de l'annonce.";
        }
   }

}
