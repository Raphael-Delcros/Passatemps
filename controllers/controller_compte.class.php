<?php

class ControllerCompte extends Controller
{

    private array $reglesValidation;

    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);

        $config = Config::get();
        $this->reglesValidation = [
            'email' => [
                'obligatoire' => true,
                'longueur_min' => 5,
                'longueur_max' => 254,
                'type' => 'string',
                'format' => FILTER_VALIDATE_EMAIL,
            ],
            'password' => [
                'obligatoire' => true,
                'longueurMin' => 8,
                'longueurMax' => 32,
                'type' => 'string',
                'format' => $config['regex']['mot_de_passe']
            ],
            'passwordMatch' => [
                'obligatoire' => true,
                'longueurMin' => 8,
                'longueurMax' => 32,
                'type' => 'string',
                'format' => $config['regex']['mot_de_passe']
            ],
            'nom' => [
                'obligatoire' => true,
                'longueurMin' => 3,
                'longueurMax' => 50,
                'type' => 'string',
                'format' => $config['regex']['texte_espace']
            ],
            'prenom' => [
                'obligatoire' => true,
                'longueurMin' => 3,
                'longueurMax' => 50,
                'type' => 'string',
                'format' => $config['regex']['texte']
            ],
            'terms' => [
                'obligatoire' => true,
            ],
        ];
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
     * Inscrit l'utilisateur si et seulement si :
     * - Nom et Prénom sont entre [3;50] caractères, sont inscrits et sont alphabétiques
     * - Email est sous format email, est entre [5:254] caractères et est inscrit
     * - password & passwordMatch sont égaux, inscrit, entre [8;32] caractères et sont alphanumériques avec un symbole et une majuscule minimum.
     *
     * @todo à modifier quand le hashage des mots de passe sera en place
     * @todo IMPORTANT : Afficher comment le MDP est pas robuste. Je crois que la fonction qu'on utilise peux le rendre, mais faut le faire marcher.
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
            header('Location: index.php?controleur=connexion&methode=connexion');
        } else {
            // Afficher les erreurs
            $this->afficherErreursInscription($messagesErreurs);
            return;
        }
    }
}
