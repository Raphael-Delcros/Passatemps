<?php

class controllerBannissement extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    public function lister() {
        $dao = new BannissementDao($this->getPdo());
        $bannissements = $dao->findAllAssoc();

        $template = $this->getTwig()->load('bannissements.html.twig');
        echo $template->render([
            'bannissements' => $bannissements,
            'menu' => 'bannissements'
        ]);
    }

    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new BannissementDao($this->getPdo());
        $bannissement = $dao->find($id);

        $template = $this->getTwig()->load('bannissement.html.twig');
        echo $template->render([
            'bannissement' => $bannissement,
            'menu' => 'bannissement'
        ]);
    }
}