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

    private array $reglesValidation;

    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
        
        $this->reglesValidation = [
        'email' => [
            'obligatoire' => true,
            'type' => 'string',
            'longueur_min' => 5,
            'longueur_max' => 254,
            'format' => FILTER_VALIDATE_EMAIL,
        ],
        'accepterNewsletter' => ['obligatoire' => true],
        'accepterConfidentialite' => ['obligatoire' => true]
    ];
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

        $validator = new Validator($this->reglesValidation);
        $donnees = $_POST;
        
        // Validation des données
        $donneesValides = $validator->valider($donnees);
        $messagesErreurs = $validator->getMessagesErreurs();
        
        // Actions si valide
        if ($donneesValides) {
            // Enregistrement dans la base de données
            $dao = new NewsletterDao($this->getPdo());
            $dao->inscrire($email);

            // Afficher un message de succès
            $template = $this->getTwig()->load('newsletter_success.html.twig');
            echo $template->render(['email' => $email]);
        } else {
            // Afficher les erreurs
            $template = $this->getTwig()->load('newsletter.html.twig');
            echo $template->render(['errors' => $messagesErreurs, 'email' => $email]);
        }
    }
}
