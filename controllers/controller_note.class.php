<?php
/**
 * @file controller_note.class.php
 * @brief Définit la classe ControllerNote pour gérer les actions liées aux bannissements.
 * 
 */

/**
 * @brief Classe ControllerBannissement pour gérer les actions liées aux bannissements
 */
class controllerNote extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    /**
     * Affiche toutes les notes
     *
     * @return void
     */
    public function lister() {
        $dao = new BannissementDao($this->getPdo());
        $note = $dao->findAllAssoc();

        $template = $this->getTwig()->load('note.html.twig');
        echo $template->render([
            'note' => $note
        ]);
    }

    /**
     * Affiche la moyenne des notes d'un compte grace à son identifiant
     * 
     * @return void
     */
    public function afficher() {
        $idCompteNote = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new NoteDao($this->getPdo());
        $note = $dao->findAverage($idCompteNote);

        $template = $this->getTwig()->load('note.html.twig');
        echo $template->render([
            'note' => $note,
        ]);
    }
}