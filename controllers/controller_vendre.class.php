<?php

/**
 * @file controller_vendre.class.php
 * @brief Affiche les pages liées à la vente de jeux
 * 
 */

/**
 * @brief Classe Controller pour la Vente de jeux
 */
class ControllerVendre extends controller
{
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }


    /**
     * @brief Affiche un formulaire de vente si l'utilisateur est connecté
     * 
     *
     * @return void
     */
    public function creer()
    {

        if (isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('vendre.html.twig');
            echo $template->render();
        } else {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
        }
    }

    /**
     * @brief Ajoute une annonce de vente dans la base de données
     * 
     * @todo Changer idCommpteVendeur quand les comptes seront faits, Faire id jeu quand la recherche et la récuperation d'id sera faite
     *
     * @return void
     */
    public function confirmerVente()
    {
        $data = $_POST;

        $date = getdate();
        $stringdate =  $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];

        $dao = new AnnonceDao($this->getPdo());
        $idAnnonce = $dao->lastId();

        $annonce = new Annonce(
            $idAnnonce,
            $data['titre'],
            $data['description'],
            $data['prix'],
            $stringdate,
            $data['etatJeu'],
            'en Vente', //etatVente
            $data['idJeu'],
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

    /**
     * @brief Affiche le récapitulatif de l'annonce avant confirmation
     * 
     *
     * @return void
     */
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
