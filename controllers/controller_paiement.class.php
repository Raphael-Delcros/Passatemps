<?php
/**
 * @file controller_paiement.class.php
 * @brief Définit la classe ControllerPaiement pour gérer ce qui est lié avec la gestion des paiements.
 *
 */


/**
 * @brief Classe ControllerPaiement pour gérer les paiements liés à l'achat d'annonces
 */
class ControllerPaiement extends controller {
    /**
     * Constructeur de la classe ControllerPaiement
     *
     * @param Twig\Environment $twig Environnement Twig pour le rendu des templates
     * @param Twig\Loader\FilesystemLoader $loader Chargeur de fichiers Twig
     */
    public function __construct( Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    /**
     * Fonction afficher de la classe ControllerPaiement
     *
     * Affiche la page de paiement de l'annonce.
     *
     * @return void
     */
    public function afficher(){
        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
            return;
        } else {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new AnnonceDao($this->getPdo());
        $annonce = $dao->findAssoc($id);


        $template = $this->getTwig()->load('paiement.html.twig');
        echo $template->render([
            'annonce' => $annonce,
        ]);
        }
    }
}
