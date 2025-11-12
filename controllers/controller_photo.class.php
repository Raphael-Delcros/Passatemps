<?php

class ControllerPhoto extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    // Liste toutes les photos
    public function lister() {
        $dao = new PhotoDao($this->getPdo());
        $photosAssoc = $dao->findAllAssoc();       
        $photos = $dao->hydrateAll($photosAssoc);  

        $template = $this->getTwig()->load('photos.html.twig');
        echo $template->render(['photos' => $photos]);
    }

    // Affiche une seule photo
    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (!$id) {
            throw new Exception("ID de photo manquant !");
        }

        $dao = new PhotoDao($this->getPdo());
        $photoAssoc = $dao->findAssoc($id);
        if (!$photoAssoc) {
            throw new Exception("Photo introuvable !");
        }

        $photo = $dao->hydrate($photoAssoc);  // transformer en objet Photo

        $template = $this->getTwig()->load('photo.html.twig');
        echo $template->render(['photo' => $photo]);
    }
}
