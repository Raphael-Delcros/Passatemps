<?php
class ControllerCataloguer  extends Controller
{
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

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
