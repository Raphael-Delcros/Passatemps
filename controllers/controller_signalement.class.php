<?php

class ControllerSignalement extends Controller {

    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    public function lister() {
        $dao = new SignalementDao($this->getPdo());
        $signalementsAssoc = $dao->findAllAssoc();
        $signalements = $dao->hydrateAll($signalementsAssoc);

        $template = $this->getTwig()->load('signalements.html.twig');
        echo $template->render([
            'signalements' => $signalements,
            'menu' => 'signalements'
        ]);
    }

    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new SignalementDao($this->getPdo());
        $signalementAssoc = $dao->findAssoc($id);
        $signalement = $dao->hydrate($signalementAssoc);

        $template = $this->getTwig()->load('signalement.html.twig');
        echo $template->render([
            'signalement' => $signalement,
            'menu' => 'signalements'
        ]);
    }
}
