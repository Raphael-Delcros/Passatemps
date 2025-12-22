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
                'format' => FILTER_VALIDATE_EMAIL,
            ],
            'password' => [
                'obligatoire' => true,
                'longueurMin' => 8,
                'longueurMax' => '32',
                'format' => $config['regex']['mot_de_passe']
            ],
            'passwordMatch' => [
                'obligatoire' => true,
                'longueurMin' => 8,
                'longueurMax' => '32',
                'format' => $config['regex']['mot_de_passe']
            ],
            'nom' => [
                'obligatoire' => true,
                'longueurMin' => 3,
                'longueurMax' => 50,
                'format' => $config['regex']['texte_espace']
            ],
            'prenom' => [
                'obligatoire' => true,
                'longueurMin' => 3,
                'longueurMax' => 50,
                'format' => $config['regex']['texte']
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
     * @todo à modifier quand le hashage des mots de passe sera en place
     * 
     * @return void
     */
    public function inscrire(): void
    {
        var_dump($_POST);
        if (isset($_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom'])) {

            $dao = new CompteDao($this->getPdo());
            if ($dao->findEmail($_POST['email'])) {
                // Gérer le cas où l'email existe déjà
                echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
                return;
            }



            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);

            $donnees = $_POST;

            $validator = new Validator($this->reglesValidation);

            // Validation des données
            $donneesValides = $validator->valider($donnees);
            $messagesErreurs = $validator->getMessagesErreurs();

            if ($donneesValides) {
                $dao = new CompteDao($this->getPdo());
                $compte = new Compte(null, $nom, $prenom, $email, $password, null, null, 'utilisateur');
                $dao->insert($compte);
            } else {
                // Afficher les erreurs
                $template = $this->getTwig()->load('inscription.html.twig');
                echo $template->render(['errors' => $messagesErreurs]);
                return;
            }

            // Redirection vers la page de connexion après inscription
            header('Location: index.php?controleur=connexion&methode=connexion');
            exit();
        } else {
            // Gérer le cas où les données du formulaire ne sont pas complètes
            echo "Veuillez remplir tous les champs du formulaire d'inscription.";
        }
    }
}
