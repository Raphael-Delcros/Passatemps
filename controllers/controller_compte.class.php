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

    /**
     * @brief Traite le formulaire d'inscription
     *
     * @todo à modifier quand le hashage des mots de passe sera en place
     * 
     * @return void
     */
    public function inscrire(): void
    {
        if (isset($_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom'])) {

            $dao = new CompteDao($this->getPdo());
            if ($dao->findEmail($_POST['email'])) {
                // Gérer le cas où l'email existe déjà
                $template = $this->getTwig()->load('inscription.html.twig');
                echo $template->render([
                    'erreur' => 'Cet email est déjà utilisé pour un autre compte.'
                ]);
                return;
            }

            $email = $_POST['email'];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];

            $dao = new CompteDao($this->getPdo());
            $compte = new Compte(null, $_POST['nom'], $_POST['prenom'], $_POST['email'], password_hash($_POST['password'],PASSWORD_BCRYPT), null, null, 'utilisateur');
            $dao->insert($compte);

            // Redirection vers la page de connexion après inscription
            header('Location: index.php?controleur=connexion&methode=connexion');
            exit();
        } else {
            // Gérer le cas où les données du formulaire ne sont pas complètes
            echo "Veuillez remplir tous les champs du formulaire d'inscription.";
        }
    }
}
