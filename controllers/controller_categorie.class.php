<?php
class ControllerCategorie  extends Controller {
    public function __construct( Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    public function afficher()
    {
        echo "afficher categorie";
    }

    public function lister()
    {
        //recupération des catégories
        $managerCategorie = new CategorieDAO($this->getPdo());
        //$tableau = $managerCategorie->find(1);
        var_dump($managerCategorie->find(1));
        //$categories = $managerCategorie->hydrateAll($tableau);

        //Choix du template
        //$template = $this->getTwig()->load('index.html.twig');

        //echo $tableau->getNom();
        //Affichage de la page
        //echo $template->render(array(
           // 'categories' => $categories,
          //  'menu' => 'categories',
            // 'description' => "Le site des recettes de cuisine de l'IUT de Bayonne"
        //));
    }

}