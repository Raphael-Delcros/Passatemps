<?php
/**
 * @file controller_newsletter.class.php
 * 
 * @brief Contrôle les pages liées à la newsletter
 */

/**
 * @brief Classe Controller pour la Newsletter
 */
class ControllerNewsletter extends Controller
{
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }
    
    /**
     * Affiche la page de newsletter
     *
     * @return void
     */
    public function newsletter()
    {
        $template = $this->getTwig()->load('newsletter.html.twig');
        echo $template->render();
    }

    /**
     * Ajoute à la base de données seulement si les conditions sont acceptées
     *
     * @todo Passer au Validator quand il sera crée
     * @return void
     */
    public function inscriptionNewsletter()
    {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $accepterNews = isset($_POST['accepterNews']) ? true : false;
        $accepterConf = isset($_POST['accepterConf']) ? true : false;

        // Validation des données
        $errors = [];
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez entrer une adresse email valide.";
        }
        if (!$accepterNews) {
            $errors[] = "Vous devez accepter de recevoir les nouvelles.";
        }
        if (!$accepterConf) {
            $errors[] = "Vous devez accepter la politique de confidentialité.";
        }
        if (!empty($email)) {
            // Vérifier si l'email est déjà inscrit
            $dao = new NewsletterDao($this->getPdo());
            $existingNewsletter = $dao->findByEmail($email);
            if ($existingNewsletter !== null) {
                $errors[] = "Cette adresse email est déjà inscrite à la newsletter.";
            }
        }

        if (empty($errors)) {
            // Enregistrement dans la base de données
            $dao = new NewsletterDao($this->getPdo());
            $dao->inscrire($email);

            // Afficher un message de succès
            $template = $this->getTwig()->load('newsletter_success.html.twig');
            echo $template->render(['email' => $email]);
        } else {
            // Afficher les erreurs
            $template = $this->getTwig()->load('newsletter.html.twig');
            echo $template->render(['errors' => $errors, 'email' => $email]);
        }
    }
}
