<?php

/**
 * @file controller_messagerie.class.php
 * @brief Affiche les pages liées à la messagerie entre des utilisateurs
 * @todo Modifier cette classe quand on aura les comptes afin d'afficher des messages entre utilisateurs.
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
     * @todo Quand on aura les comptes : Modifier la fonction pour afficher les messages par compte 
     *
     * @return void
     */
    public function lister()
    {
        if (isset($_SESSION['idCompte'])) {
            $dao = new MessagerieDao($this->getPdo());

            $messages = $dao->findAssocComptes($_SESSION['idCompte']); // récupère tous   les messages d'un utilisateur en tableau associatif
            $template = $this->getTwig()->load('messagerie.html.twig');
            echo $template->render([
                'messages' => $messages,
            ]);
        } else {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
        }
    }
    /**
     * @brief Affiche un message unique.
     * 
     * @todo Quand on aura les comptes : Afficher tous les messages entre l'utilisateur et l'autre compte.
     *
     * @return void
     */
    public function afficher()
    {
        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
            return;
        } else {

            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $nom = isset($_GET['nom']) ? $_GET['nom'] : null;
            $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : null;
            $monNom = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;
            $monPrenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : null;

            $dao = new MessagerieDao($this->getPdo());
            $messages = $dao->findAssocConversation($_SESSION['idCompte'], $id);
            var_dump($messages);
            $template = $this->getTwig()->load('conversation.html.twig');
            var_dump($nom);
            var_dump($prenom);
            var_dump($id);
            var_dump($monNom);
            var_dump($monPrenom);
            echo $template->render([
                'messages' => $messages,
                'nom' => $nom,
                'prenom' => $prenom,
                'idCompte' => $id,
                'monNom' => $monNom,
                'monPrenom' => $monPrenom
            ]);
        }
    }
}
