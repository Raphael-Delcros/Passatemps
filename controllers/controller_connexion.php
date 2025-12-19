<?php

use LDAP\Result;

class ControllerConnexion extends controller
{
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    /**
     * @brief Affiche la page de connexion
     *
     * @return void
     */
    public function connexion()
    {
        if (isset($_SESSION['idCompte'])) {
            $id = $_SESSION['idCompte'];
            $dao = new CompteDao($this->getPdo());
            $compte = $dao->find($id);

            $template = $this->getTwig()->load('compte.html.twig');
            echo $template->render([
                'compte' => $compte,
            ]);
        } else {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
        }
    }

    /**
     * @brief Authentifie l'utilisateur en fonction des données du formulaire de connexion
     *
     * @todo à changer quand le hashage des mots de passe sera en place
     * 
     * @return void
     */
    public function authentification()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Création de l'utilisateur avec les données saisies
            $dao = new CompteDao($this->getPdo());
            $result = $dao->findEmailPass($email, $password);
            if ($result) {
                $reussite = true;

                //Création d'un utilisateur 
                $arrayUtilisateur = $dao->findAssoc($result['idCompte']);
                $utilisateur = $dao->hydrate($arrayUtilisateur);
                $_SESSION['email'] = $utilisateur->getEmail();
                $_SESSION['nom'] = $utilisateur->getNom();
                $_SESSION['prenom'] = $utilisateur->getPrenom();
                $_SESSION['idCompte'] = $utilisateur->getIdCompte();
                $_SESSION['role'] = $utilisateur->getRole();

                header('Location: index.php');
            } else {
                $reussite = false;

                $template = $this->getTwig()->load('connexion.html.twig');
                echo $template->render([
                    'reussite' => $reussite,
                ]);
                // à verif 
            }
        }
    }

    /**
     * @brief Déconnecte l'utilisateur en détruisant la session
     *
     * @return void
     */

    public function deconnexion()
    {
        // Destruction de la session
        session_unset();
        session_destroy();

        // Redirection vers la page de connexion
        header('Location: index.php');
        exit();
    }
    /*
            try {
                // Tentative d'authentification
                if ($utilisateur->connexion()) {
                    echo "Authentification réussie.";
                } else {
                    // Message d'erreur et lien pour retourner au formulaire d'authentification
                    echo "Erreur : Email ou mot de passe incorrect.";
                    echo '<br><a href="authentification.html">Retourner au formulaire d\'authentification</a>';
                }
            } catch (Exception $e) {
                // Gestion de l'exception "compte_desactive"
                if ($e->getMessage() === "compte_desactive") {
                    $tempsRestant = $utilisateur->tempsRestantAvantReactivationCompte();
                    $minutes = floor($tempsRestant / 60);
                    $secondes = $tempsRestant % 60;

                    echo "<h1>Compte bloqué</h1>";
                    echo "<p>Votre compte est temporairement désactivé en raison de plusieurs tentatives échouées. 
                  Veuillez réessayer dans {$minutes} minutes et {$secondes} secondes.</p>";
                    echo '<a href="authentification.html">Retourner au formulaire d\'authentification</a>';
                } else {
                    // Gestion des autres exceptions
                    echo "<h1>Erreur inattendue</h1>";
                    echo "<p>{$e->getMessage()}</p>";
                    echo '<a href="authentification.html">Retourner au formulaire d\'authentification</a>';
                }
            }
                
        }
    }*/
}
