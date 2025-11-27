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
        $dao = new MessagerieDao($this->getPdo());
        $messages = $dao->findAllAssoc(); // récupère tous les messages en tableau associatif

        $template = $this->getTwig()->load('messagerie.html.twig');
        echo $template->render([
            'messages' => $messages,
        ]);
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
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new MessagerieDao($this->getPdo());
        $message = $dao->findAssoc($id);

        $template = $this->getTwig()->load('message.html.twig');
        echo $template->render([
            'message' => $message,
        ]);
    }
}
