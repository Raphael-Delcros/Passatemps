<?php

class ControllerCompte extends Controller
{
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    // Liste tous les comptes
    public function lister()
    {
        $dao = new CompteDao($this->getPdo());
        $comptes = $dao->findAllAssoc(); // récupère tous les comptes en tableau associatif

        $template = $this->getTwig()->load('comptes.html.twig');
        echo $template->render([
            'comptes' => $comptes,
        ]);
    }

    // Affiche un seul compte
    public function afficher()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new CompteDao($this->getPdo());
        $compte = $dao->find($id);

        $template = $this->getTwig()->load('compte.html.twig');
        echo $template->render([
            'compte' => $compte,
        ]);
    }

    /**
     * @brief Affiche la page d'inscription
     *
     * @return void
     */
    public function inscription()
    {
        $template = $this->getTwig()->load('inscription.html.twig');
        echo $template->render();
    }
    
    public function newsletter()
    {
        $template = $this->getTwig()->load('newsletter.html.twig');
        echo $template->render();
    }
    
    public function inscriptionNewsletter()
    {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $accepterNews = isset($_POST['accepterNews']) ? true : false;
        $accepterConf = isset($_POST['accepterConf']) ? true : false;

        // Validation des données
        $errors = [];
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez entrer une adresse email valide.";
        }
        if (!$accepterNews) {
            $errors[] = "Vous devez accepter de recevoir les nouvelles.";
        }
        if (!$accepterConf) {
            $errors[] = "Vous devez accepter la politique de confidentialité.";
        }

        if (empty($errors)) {
            // Enregistrement dans la base de données
            $dao = new CompteDao($this->getPdo());
            // $dao->inscrire($email);

            // Afficher un message de succès
            $template = $this->getTwig()->load('newsletter_success.html.twig');
            echo $template->render(['email' => $email]);
        } else {
            // Afficher les erreurs
            $template = $this->getTwig()->load('newsletter.html.twig');
            echo $template->render(['errors' => $errors, 'email' => $email]);
        }
    }
}
