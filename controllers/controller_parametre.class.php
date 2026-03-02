<?php

/**
 * @file controller_compte.class.php
 * @brief Définit la classe ControllerCompte pour gérer les actions liées aux comptes.
 * 
 */

/**
 * @brief Classe ControllerCompte pour gérer les actions liées aux comptes
 */
class ControllerParametre extends Controller
{
    /**
     * Règles de validation pour l'inscription, relié à la classe Validator
     *
     * @var array
     */
    private array $reglesValidationMdp;
    private array $reglesValidationPerso;

    /**
     * Constructeur de la classe ControllerParametre
     *
     * @param Twig\Environment $twig Environnement Twig pour le rendu des templates
     * @param Twig\Loader\FilesystemLoader $loader Chargeur de fichiers Twig
     */
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);

        $config = Config::get();
        $this->reglesValidationPerso = [
            'email' => [
                'obligatoire' => false,
                'longueur_min' => 5,
                'longueur_max' => 254,
                'type' => 'string',
                'format' => FILTER_VALIDATE_EMAIL,
            ],
            'nom' => [
                'obligatoire' => false,
                'longueurMin' => 3,
                'longueurMax' => 50,
                'type' => 'string',
                'format' => $config['regex']['texte_espace']
            ],
            'prenom' => [
                'obligatoire' => false,
                'longueurMin' => 3,
                'longueurMax' => 50,
                'type' => 'string',
                'format' => $config['regex']['texte']
            ],
        ];
        $this->reglesValidationMdp = [
            'currentPassword' => [
                'obligatoire' => true,
                'longueurMin' => 8,
                'longueurMax' => 32,
                'type' => 'string',
                'format' => $config['regex']['mot_de_passe']
            ],
            'newPassword' => [
                'obligatoire' => true,
                'longueurMin' => 8,
                'longueurMax' => 32,
                'type' => 'string',
                'format' => $config['regex']['mot_de_passe']
            ]
        ];
    }

    /**
     * @brief Modifie les informations d'un compte utilisateur
     *
     * @return void
     */
    public function afficher($modifPerso = false, $modifMDP = false, $erreur = NULL): void
    {
        if (!isset($_SESSION['idCompte'])) {
            header('Location: index.php?controleur=connexion&methode=connexion');
            exit();
        }

        $template = $this->getTwig()->load('parametre.html.twig');
        echo $template->render([
            'erreurs' => $erreur
        ]);
    }

    /**
     * @brief Enregistre les modifications apportées au compte utilisateur
     *
     * @return void
     */
    public function enregistrerModifications(): void
    {
        $idCompte = $_SESSION['idCompte'];
        $dao = new CompteDao($this->getPdo());
        $compte = $dao->find($idCompte);

        if (isset($_POST) && !empty($_POST)) {

            $donnees = $_POST; // Pour le Validator

            // Validation des données
            $validator = new Validator($this->reglesValidationPerso);
            $donneesValides = $validator->valider($donnees);
            $messagesErreurs = $validator->getMessagesErreurs();

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $dao = new CompteDao($this->getPdo());

                // Gérer le cas où l'email existe déjà
                if ($dao->findEmail($_POST['email'])) {
                    $messagesErreurs["usedEmail"] = true;
                } else {
                    $compte->setEmail(strip_tags($_POST['email']));
                    $_SESSION['email'] = strip_tags($_POST['email']);
                }
            }

            if (isset($_POST['nom']) && !empty($_POST['nom'])) {
                $compte->setNom(strip_tags($_POST['nom']));
                $_SESSION['nom'] = strip_tags($_POST['nom']);
            }

            if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
                $compte->setPrenom(strip_tags($_POST['prenom']));
                $_SESSION['prenom'] = strip_tags($_POST['prenom']);
            }

            if ($donneesValides && empty($messagesErreurs)) {
                $dao->update($compte);
            }

            $this->afficher(true, false, $messagesErreurs);
        }
    }

    public function changerMdp(): void
    {
        $dao = new CompteDao($this->getPdo());
        $compte = $dao->find($_SESSION['idCompte']);
        $donnees = $_POST; // Pour le Validator


        // Validation des données
        $validator = new Validator($this->reglesValidationMdp);
        $donneesValides = $validator->valider($donnees);
        $messagesErreurs = $validator->getMessagesErreurs();

        if (isset($_POST['currentPassword']) && !empty($_POST['currentPassword'])) {
            // Vérifier que le mot de passe actuel est correct
            if (password_verify($_POST['currentPassword'], $compte->getMotDePasseHache())) {
                // Si le mot de passe actuel est correct, vérifier les nouveaux mots de passe
                if (isset($_POST['newPassword']) && isset($_POST['confirmation'])) {
                    $newPassword = $_POST['newPassword'];
                    $confirmPassword = $_POST['confirmation'];
                    // Mettre à jour le mot de passe si un nouveau mot de passe est fourni et qu'il correspond à la confirmation
                    if ($newPassword == $confirmPassword) {

                        if ($donneesValides && empty($messagesErreurs)) {
                            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                            $compte->setMotDePasseHache($hashedPassword);
                            $dao->update($compte);
                        }
                    } else {
                        $messagesErreurs['confirmationMismatch'] = true;
                    }
                }
            } else {
                $messagesErreurs['currentPasswordInvalid'] = true;
            }
        }
        $this->afficher(false, true, $messagesErreurs);
    }

    public function supprimerCompte(): void
    {
        $dao = new CompteDao($this->getPdo());
        $dao->delete($_SESSION['idCompte']);
        session_destroy();
        header('Location: index.php');
    }
}
