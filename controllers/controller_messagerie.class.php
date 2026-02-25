<?php

/**
 * @file controller_messagerie.class.php
 * @brief Affiche les pages liées à la messagerie entre des utilisateurs
 * 
 */

/**
 * @brief Classe Controller pour la Messagerie
 */
class ControllerMessagerie extends Controller
{
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    /**
     * @brief Liste les messages reçus.
     *
     * @return void
     */
    public function lister()
    {
        if (isset($_SESSION['idCompte'])) {
            $dao = new MessagerieDao($this->getPdo());

            $messages = $dao->findAssocComptes($_SESSION['idCompte']); // récupère tous   les messages d'un utilisateur en tableau associatif
            $utilisateurs = $dao->findAssocNoComptes($_SESSION['idCompte']);
            $id = $_SESSION['idCompte'];
            $template = $this->getTwig()->load('messagerie.html.twig');
            echo $template->render([
                'messages' => $messages,
                'utilisateurs' => $utilisateurs,
                'id' => $id,
                'menu' => 'messagerie'
            ]);
        } else {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
        }
    }
    /**
     * @brief Affiche un message unique.
     *
     * @param mixed $erreur
     * @return void
     */
    public function afficher(mixed $erreur = null)
    {
        if (!isset($_SESSION['idCompte']) or !isset($_GET['id'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
            return;
        } else {
            if ($erreur == null) {
                $erreur = false;
            }

            $dao = new CompteDao($this->getPdo());
            $compteAutre = $dao->find($_GET['id']);
            
            $id = $compteAutre->getIdCompte();
            $nom = $compteAutre->getNom();
            $prenom = $compteAutre->getPrenom();
            $monNom = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;
            $monPrenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : null;

            $dao = new MessagerieDao($this->getPdo());
            $messages = $dao->findAssocConversation($_SESSION['idCompte'], $id);
            $template = $this->getTwig()->load('conversation.html.twig');
            echo $template->render([
                'messages' => $messages,
                'nom' => $nom,
                'prenom' => $prenom,
                'idCompte' => $id,
                'monNom' => $monNom,
                'monPrenom' => $monPrenom,
                'erreur' => $erreur,
                'menu' => 'messagerie'
            ]);
        }
    }

    /**
     * @brief Envoie un message à un autre utilisateur.
     *
     * @return void
     */

    public function envoyer()
    {
        // 1. Vérification session
        if (!isset($_SESSION['idCompte'])) {
            header("Location: index.php?controleur=connexion"); // Rediriger vers connexion si pas de session
            exit();
        }

        // 2. Vérification données POST
        if (!isset($_POST['message'], $_POST['idDestinataire'])) {
            header("Location: index.php?controleur=messagerie");
            exit();
        }

        $idDest = $_POST['idDestinataire'];
        $nomDest = $_POST['nomDestinataire'] ?? ''; // Récupéré du champ caché
        $prenomDest = $_POST['prenomDestinataire'] ?? ''; // Récupéré du champ caché

        // 3. Préparation de la date (plus simple que getdate)
        $stringdate = date('Y-m-d H:i:s');

        // 4. Insertion
        $dao = new MessagerieDao($this->getPdo());
        $message = new Messagerie(
            null,
            $_POST['message'],
            $stringdate,
            $_SESSION['idCompte'],
            $idDest
        );

        $result = $dao->InsertInto($message);

        // 5. REDIRECTION (C'est ici que ça se joue)
        if ($result) {
            // On construit l'URL de retour avec tous les paramètres nécessaires
            $url = "index.php?controleur=messagerie&methode=afficher&id=$idDest&nom=$nomDest&prenom=$prenomDest";
            header("Location: " . $url);
            exit();
        } else {
            // En cas d'erreur, on peut rediriger vers une page d'erreur ou la messagerie
            header("Location: index.php?controleur=messagerie&error=1");
            exit();
        }
    }
}
