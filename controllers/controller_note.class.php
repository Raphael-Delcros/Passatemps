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

        // 1. Vérification session
        if (!isset($_SESSION['idCompte'])) {
            header("Location: index.php?controleur=connexion"); // Rediriger vers connexion si pas de session
            exit();
        }


        $dao = new LivraisonDao($this->getPdo());

        $idCompteQuiNote = $_POST['idCompteQuiNote'] ?? '';
        $idCompteNote = $dao->getIdVendeur($_POST['idLivraison']);
        $note = $_POST['note']; 

        var_dump($note);


        $idCompteQuiNoteInt = intval($idCompteQuiNote);
        $idCompteNoteInt = intval($idCompteNote, $base = 10);
        $noteInt = intval($note, $base = 10);

        
        var_dump($idCompteQuiNoteInt);
        var_dump($idCompteQuiNote);
        

        // 4. Insertion
        $dao = new NoteDao($this->getPdo());
        $notation = new Note(
            $noteInt,
            $idCompteQuiNoteInt,
            $idCompteNote
        );

        $result = $dao->insert($notation);

        // 5. REDIRECTION (C'est ici que ça se joue)
        if ($result) {
            // On construit l'URL de retour avec tous les paramètres nécessaires
            $url = "index.php?controleur=livraison&methode=lister";
            header("Location: " . $url);
            exit();
        } else {
            // En cas d'erreur, on peut rediriger vers une page d'erreur ou la messagerie
            header("Location: index.php?controleur=messagerie&error=1");
            exit();
        }

    }

}