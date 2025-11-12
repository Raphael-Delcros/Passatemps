<?php 

Class ControllerAnnonce extends controller {
    public function __construct( Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    public function lister()
    {
        $dao = new AnnonceDao($this->getPdo());
        $annonces = $dao->findAllAssoc();

        $template = $this->getTwig()->load('annonces.html.twig');
        echo $template->render([
        'annonces' => $annonces
        ]);
    }

    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new AnnonceDao($this->getPdo());
        $annonce = $dao->find($id);

        $template = $this->getTwig()->load('annonce.html.twig');
        echo $template->render([
            'annonce' => $annonce,
        ]);
    }
}