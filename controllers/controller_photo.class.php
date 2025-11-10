<?php

class ControllerPhoto extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    public function lister() {
        $dao = new PhotoDao($this->getPdo());
        $photos = $dao->findAllAssoc();

        $template = $this->getTwig()->load('photos.html.twig');
        echo $template->render(['photos' => $photos]);
    }

    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (!$id) {
            throw new Exception("ID de photo manquant !");
        }

        $dao = new PhotoDao($this->getPdo());
        $photo = $dao->findAssoc($id);

        if (!$photo) {
            throw new Exception("Photo introuvable !");
        }

        $template = $this->getTwig()->load('photo.html.twig');
        echo $template->render(['photo' => $photo]);
    }
}
