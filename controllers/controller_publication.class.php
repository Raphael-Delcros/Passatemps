<?php

class ControllerPublication extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    public function afficher() {
        echo "afficher publication";
    }

    public function lister() {
        echo "lister publication";
    }
}