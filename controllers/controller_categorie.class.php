<?php
class ControllerCategorie  extends Controller
{
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

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
