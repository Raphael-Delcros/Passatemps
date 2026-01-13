<?php

/**
 * @file controller_livraison.class.php
 * @author Raphaël Delcros
 * 
 * @brief Contrôleur des livraisons
 * @details Ce contrôleur gère l'affichage et la liste des livraisons.
 * 
 */

/**
 * @brief Classe Controller pour les Livraison
 */
class ControllerLivraison extends Controller
{
    /**
     * @brief Constructeur de ControllerLivraison
     *
     * @param Twig\Environment $twig
     * @param Twig\Loader\FilesystemLoader $loader
     */
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    /**
     * @brief Affiche la page d'une livraison
     *
     * @return void
     */
    public function afficher()
    {
        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
            return;
        } else {
            $dao = new LivraisonDao($this->getPdo());

            $commande = $dao->findAllAssocFromIdWithAnnonceInfo($_SESSION['idCompte'], isset($_GET['id']) ? intval($_GET['id']) : null);
            $template = $this->getTwig()->load('livraison.html.twig');
            echo $template->render([
                'commande' => $commande[0],
            ]);
        }
    }

    /**
     * @brief Affiche la liste des livraisons
     *
     * @return void
     */
    public function lister()
    {
        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
            return;
        } else {
            $dao = new LivraisonDao($this->getPdo());
            $commandes = $dao->findAllAssocFromIdWithAnnonceInfo($_SESSION['idCompte']);
            $template = $this->getTwig()->load('commandes.html.twig');
            echo $template->render([
                'commandes' => $commandes,
            ]);
        }
    }
}
