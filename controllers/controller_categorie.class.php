<?php
/**
 * @file controller_categorie.class.php
 * @brief Contrôleur pour les catégories
 */
class ControllerCategorie  extends Controller
{
    /**
     * @brief Constructeur
     */
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    /**
     * @brief Affiche une catégorie spécifique
     */
    public function afficher()
    {
         $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new CategorieDao($this->getPdo());
        $categorie = $dao->find($id);

        $template = $this->getTwig()->load('categorie.html.twig');
        echo $template->render([
            'categorie' => $categorie,
        ]);
    }

    /**
     * @brief Liste toutes les catégories
     */
    public function lister()
    {
       $dao = new CategorieDao($this->getPdo());
        $categories = $dao->findAllAssoc(); // récupère tous les jeux en tableau associatif

        $template = $this->getTwig()->load('categories.html.twig');
        echo $template->render([
            'categories' => $categories,
        ]);
    }
}
