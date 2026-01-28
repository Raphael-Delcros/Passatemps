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
    
    /**
     * @brief Affiche la page d'achat d'une annonce
     *
     * @return void
     */
    public function achat()
    {
        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
            return;
        } else {
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $dao = new AnnonceDao($this->getPdo());
            $annonce = $dao->find($id);

            $template = $this->getTwig()->load('achat.html.twig');
            echo $template->render([
                'annonce' => $annonce
            ]);
        }
    }

    /**
     * @brief Update les commandes lorsque qu'une annonce est achetée
     * 
     * @return void
     */
    public function afficherResume()
    {
        $id = isset($_POST['idAnnonce']) ? intval($_POST['idAnnonce']) : null;
        $dao = new AnnonceDao($this->getPdo());
        $annonce = $dao->findAssoc($id);
        $array = [
            'idLivraison'        => null,
            'ville'              => $_POST['ville'] ?? null,
            'pays'               => $_POST['pays'] ?? null,
            'adresse'            => $_POST['adresse'] ?? null,
            'codePostal'         => $_POST['codePostal'] ?? null,
            'dateCommande'       => date('Y-m-d'),
            'dateLivraison'      => null,
            'dateReception'      => null,
            'idAnnonce'          => $_POST['idAnnonce'] ?? null,
            'idCompteAcheteur'   => $_SESSION['idCompte'],
            'numeroDeSuivi'      => null,
            'status'             => null
        ];
        $dao = new LivraisonDao($this->getPdo());
        $livraison = $dao->hydrate($array);
        $dao->insertIntoDatabase($livraison);


        $template = $this->getTwig()->load('recapitulatif.html.twig');
        echo $template->render([
            'annonce' => $annonce,
            'livraison' => $livraison
        ]);

    }
}
