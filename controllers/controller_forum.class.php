<?php
/**
 * @file controller_forum.class.php
 * @brief Contrôleur pour la gestion du forum
 */
class ControllerForum extends Controller {
    /**
     * @brief Constructeur
     */
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader) {
        parent::__construct($twig, $loader);
    }

    /**
     * @brief Liste les publications du forum
     */
    public function lister() {
        $dao = new PublicationDao($this->getPdo());
        $publications = $dao->findAllAssoc();

        $template = $this->getTwig()->load('forum.html.twig');
        echo $template->render([
            'publications' => $publications,
            'menu' => 'publications'
        ]);
    }

    /**
     * @brief Affiche une publication spécifique
     */
    public function afficher() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new PublicationDao($this->getPdo());
        $publication = $dao->find($id);
        $template = $this->getTwig()->load('publication.html.twig');
        echo $template->render([
            'publication' => $publication,
            'menu' => 'publication'
        ]);
    }
}