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
        ]);
    }

    public function afficher() {
    try {
        // Vérifie la présence et la validité de l'ID
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            throw new Exception("Aucun ID de signalement fourni.", 400);
        }

        $id = intval($_GET['id']);
        if ($id <= 0) {
            throw new Exception("L'ID fourni est invalide.", 400);
        }

        // Récupération du signalement
        $dao = new SignalementDao($this->getPdo());
        $signalementAssoc = $dao->findAssoc($id);

        if (!$signalementAssoc) {
            throw new Exception("Aucun signalement trouvé avec l'ID $id.", 404);
        }

        $signalement = $dao->hydrate($signalementAssoc);

        // Affichage du template normal
        $template = $this->getTwig()->load('signalement.html.twig');
        echo $template->render([
            'signalement' => $signalement,
        ]);

    } catch (Exception $e) {
        // Si erreur → affichage de la page d’erreur Twig
        $template = $this->getTwig()->load('erreur.html.twig');
        echo $template->render([
            'message' => $e->getMessage(),
            'code' => $e->getCode() ?: 500
        ]);
    }
}

}
