<?php
/**
 * @file controller_cataloguer.class.php
 * @brief Contrôleur pour la gestion des cataloguages (liaison jeux-catégories)
 */ 

class ControllerCataloguer  extends Controller
{
    /**
     * @brief Constructeur
     */
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    /**
     * @brief Affiche les catégories associées à un jeu
     */
    public function afficherPourJeu()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new CataloguerDao($this->getPdo());
        $categories = $dao->findAllFromGame($id);

        $template = $this->getTwig()->load('categories.html.twig');
        echo $template->render([
            'categories' => $categories,
        ]);
    }
}
