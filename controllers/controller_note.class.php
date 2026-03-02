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

        //2.Récupération des variables utiles
        $dao = new LivraisonDao($this->getPdo());

        $idCompteNote = $dao->getIdVendeur($_POST['idLivraison']); //un tableau
        $note = $_POST['note']; //un string
        $idCompteQuiNote = $_SESSION['idCompte']; 

        $noteInt = intval($note, $base = 10); //string -> int 
        $idCompteNoteInt = $idCompteNote['idCompteVendeur']; //tableau -> int 


        var_dump($noteInt);
        var_dump($idCompteQuiNote);
        var_dump($idCompteNoteInt);


        // 3. Insertion
        $dao = new NoteDao($this->getPdo());

        $notation = new Note(
            $noteInt,
            $idCompteQuiNote,
            $idCompteNoteInt
        );

        $result = $dao->insert($notation);

        // 4. REDIRECTION 
        if ($result) {
            // On construit l'URL de retour avec tous les paramètres nécessaires

            //header("index.php?controleur=livraison&methode=lister");
            exit();
        } else {
            // En cas d'erreur, on peut rediriger vers une page d'erreur ou la messagerie
            header("Location: index.php?controleur=messagerie&error=1");
            exit();
        }

    }

}