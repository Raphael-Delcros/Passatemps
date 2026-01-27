<?php

/**
 * @file controller_compte.class.php
 * @brief Définit la classe ControllerCompte pour gérer les actions liées aux comptes.
 * 
 */

/**
 * @brief Classe ControllerCompte pour gérer les actions liées aux comptes
 */
class ControllerCompte extends Controller
{
    /**
     * Règles de validation pour l'inscription, relié à la classe Validator
     *
     * @var array
     */
    private array $reglesValidation;

    /**
     * Constructeur de la classe ControllerCompte
     *
     * @param Twig\Environment $twig Environnement Twig pour le rendu des templates
     * @param Twig\Loader\FilesystemLoader $loader Chargeur de fichiers Twig
     */
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

    /**
     * affiche tous les comptes
     *
     * @return void
     */
    public function lister()
    {
        $dao = new CompteDao($this->getPdo());
        $comptes = $dao->findAllAssoc(); // récupère tous les comptes en tableau associatif

        $template = $this->getTwig()->load('comptes.html.twig');
        echo $template->render([
            'comptes' => $comptes,
        ]);
    }

    /**
     * Affiche un compte spécifique basé sur son identifiant
     * 
     * @return void
     */
    public function afficher()
    {
        if (isset($_SESSION['idCompte'])) {

            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $dao = new CompteDao($this->getPdo());
                $compte = $dao->find($id);

                $dao = new AnnonceDao($this->getPdo());
                $annonces = $dao->findByAccount($id);

                $template = $this->getTwig()->load('compte.html.twig');
                echo $template->render([
                    'other' => true,
                    'compte' => $compte,
                    'annonces' => $annonces,
                ]);
            }
            else {
            $id = $_SESSION['idCompte'];
            $dao = new CompteDao($this->getPdo());
            $compte = $dao->find($id);

            $dao = new AnnonceDao($this->getPdo());
            $annonces = $dao->findByAccount($id);

            $template = $this->getTwig()->load('compte.html.twig');
            echo $template->render([
                'other' => false,
                'compte' => $compte,
                'annonces' => $annonces,
            ]);}
        } else {
            header('Location: index.php?controleur=connexion&methode=connexion');
        }
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
     * @return void
     */
    public function inscrire(): void
    {

        // Récupération des données
        $email = strip_tags($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $passwordMatch = password_hash($_POST['passwordMatch'], PASSWORD_BCRYPT);
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);

        $donnees = $_POST; // Pour le Validator

        $validator = new Validator($this->reglesValidation);
        // Validation des données
        $donneesValides = $validator->valider($donnees);
        $messagesErreurs = $validator->getMessagesErreurs();

        $dao = new CompteDao($this->getPdo());

        // Gérer le cas où l'email existe déjà
        if ($dao->findEmail($email)) {
            $messagesErreurs[] = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        }
        // Gérer le cas où les mots de passe ne correspondent pas
        if ($_POST['password'] != $_POST['passwordMatch']) {
            $messagesErreurs[] = "Le mot de passe n'est pas le même dans les deux champs !";
        }

        if ($donneesValides && empty($messagesErreurs)) {
            $dao = new CompteDao($this->getPdo());
            $compte = new Compte(null, $nom, $prenom, $email, $password, null, null, 'utilisateur');
            $dao->insert($compte);
        } else {
            // Afficher les erreurs
            $this->afficherErreursInscription($messagesErreurs);
            return;
        }

        // Redirection vers la page de connexion après inscription
        header('Location: index.php?controleur=connexion&methode=connexion');
        exit();
    }

    /**
     * @brief Affiche les erreurs d'inscription
     * 
     * @param array $erreurs Liste des messages d'erreurs
     * @return void
     */
    public function afficherErreursInscription(array $erreurs): void
    {
        $template = $this->getTwig()->load('inscription.html.twig');
        echo $template->render([
            'erreurs' => $erreurs,
        ]);
    }
}
