<?php

class ControllerMessagerie extends Controller {
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    // Liste tous les messages
    public function lister() {
        $dao = new MessagerieDao($this->getPdo());
        $messages = $dao->findAllAssoc(); // récupère tous les messages en tableau associatif

        $template = $this->getTwig()->load('messagerie.html.twig');
        echo $template->render([
            'messages' => $messages,
        ]);
    }
    // Affiche un seul message
    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new MessagerieDao($this->getPdo());
        $message = $dao->findAssoc($id);

        $template = $this->getTwig()->load('message.html.twig');
        echo $template->render([
            'message' => $message,
        ]);
    }

}