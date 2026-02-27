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
        $dao = new NoteDao($this->getPdo());
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

    /**
     * Affiche tous les identifiant des comptes qui ont 
     * noté le compte avec l'identifiant rentré en paramètre 
     * ainsi que la note d'un compte grace à son identifiant
     * 
     * @return void
     */
    public function afficherLesNotes() {
        $idCompteNote = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new NoteDao($this->getPdo());
        $note = $dao->findNoteurs($idCompteNote);

        $template = $this->getTwig()->load('note.html.twig');
        echo $template->render([
            'notes' => $note,
        ]);
    }

    public function insererLaNote(){

        //1. Vérification données POST

        //il faut que je récupère 3 valeurs l'idCompteQuiNote, l'idCompteNote, et la note
        

        $idDest = $_POST['idDestinataire'];
        $nomDest = $_POST['nomDestinataire'] ?? ''; // Récupéré du champ caché
        $prenomDest = $_POST['prenomDestinataire'] ?? ''; // Récupéré du champ caché


        //recup de la note :
        // $niveaujava = $_POST['customRange2'];
        $idCompteNote = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new NoteDao($this->getPdo());
        $note = $dao->findNoteurs($idCompteNote);
    }

}