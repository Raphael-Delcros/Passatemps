<?php

/**
 * @file controller_paiement.class.php
 * @brief Définit la classe ControllerPaiement pour gérer ce qui est lié avec la gestion des paiements.
 *
 */


/**
 * @brief Classe ControllerPaiement pour gérer les paiements liés à l'achat d'annonces
 */
class ControllerPaiement extends controller
{

    public array $reglesValidation;

    /**
     * Constructeur de la classe ControllerPaiement
     *
     * @param Twig\Environment $twig Environnement Twig pour le rendu des templates
     * @param Twig\Loader\FilesystemLoader $loader Chargeur de fichiers Twig
     */
    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
        $config = Config::get();
    }

    /**
     * @brief Affiche la page d'achat d'une annonce
     *
     * @return void
     */
    public function achat()
    {
        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render(['menu' => 'compte']);
            return;
        } else {
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            $daoAnnonce = new AnnonceDao($this->getPdo());
            $annonce = $daoAnnonce->find($id);
            $daoJeu = new JeuDao($this->getPdo());
            $jeu = $daoJeu->find($annonce->getIdJeu());

            $template = $this->getTwig()->load('adresseLivraison.html.twig');
            echo $template->render([
                'annonce' => $annonce,
                'jeu' => $jeu,
                'menu' => 'annonce'
            ]);
        }
    }

    /**
     * Fonction afficher de la classe ControllerPaiement
     *
     * Affiche la page de paiement de l'annonce.
     *
     * @return void
     */
    public function payer()
    {

        $data = $_POST;

        $config = Config::get();

        $this->reglesValidation = [
            'ville' => [
                'obligatoire' => true,
                'type' => 'string',
                'format' => $config['regex']['texte']
            ],
            'pays' => [
                'obligatoire' => true,
                'type' => 'string',
                'format' => $config['regex']['texte']
            ],
            'codePostal' => [
                'obligatoire' => true,
                'type' => 'integer',
                'longueurMin' => 5,
                'longueurMax' => 5
            ],
            'adresse' => [
                'obligatoire' => true,
                'type' => 'string'
            ]
        ];

        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render(['menu' => 'compte']);
            return;
        } else {
            $ville = $_POST['ville'] ?? null;
            $codePostal = $_POST['codePostal'] ?? null;
            $adresse = $_POST['adresse'] ?? null;
            $complementAdresse = $_POST['complementAdresse'] ?? null;
            $id = isset($_POST['idAnnonce']) ? (int) $_POST['idAnnonce'] : null;
            $daoAnnonce = new AnnonceDao($this->getPdo());
            $annonce = $daoAnnonce->find($id);
            $daoJeu = new JeuDao($this->getPdo());
            $jeu = $daoJeu->find($annonce->getIdJeu());

            $validator = new Validator($this->reglesValidation);
            $donnesValides = $validator->valider($data);
            $messagesErreurs = $validator->getMessagesErreurs();

            if (!$donnesValides) {
                $template = $this->getTwig()->load('adresseLivraison.html.twig');
                echo $template->render([
                    'erreurs' => $messagesErreurs,
                    'donnees' => $data,
                    'menu' => 'annonce'
                ]);
                return;
            }
            $template = $this->getTwig()->load('paiement.html.twig');
            echo $template->render([
                'annonce' => $annonce,
                'ville' => $ville,
                'codePostal' => $codePostal,
                'adresse' => $adresse,
                'complementAdresse' => $complementAdresse,
                'jeu' => $jeu,
                'menu' => 'annonce'
            ]);
        }
    }

    /**
     * Fonction affichant une page remerciement en récupérant le titre, prix de l'annonce ainsi que le compte utilisateur
     *
     * @return void
     */
    public function recapitulatif()
    {
        if (!isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render(['menu' => 'compte']);
            return;
        }

        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        $annonceDao = new AnnonceDao($this->getPdo());
        $annonce = $annonceDao->find($id);

        $compteDao = new CompteDao($this->getPdo());
        $utilisateur = $compteDao->findAssoc($_SESSION['idCompte']);

        $template = $this->getTwig()->load('recapitulatif.html.twig');
        echo $template->render([
            'annonce' => $annonce,
            'utilisateur' => $utilisateur,
            'menu' => 'annonce'
        ]);
    }

    /**
     * @brief Update les commandes lorsque qu'une annonce est achetée
     * 
     * @return void
     */
    public function afficherResume()
    {
        $data = $_POST;

        $this->reglesValidation = [
            'numCarte' => [
                'obligatoire' => true,
                'type' => 'integer',
                'longueurMin' => 16,
                'longueurMax' => 16
            ],
            'dateExpiration' => [
                'obligatoire' => true,
                'type' => 'date',
                'longueurMin' => 5,
                'longueurMax' => 5
            ],
            'codeSecurite' => [
                'obligatoire' => true,
                'type' => 'integer',
                'longueurMin' => 3,
                'longueurMax' => 3
            ]
        ];

        $id = isset($_POST['idAnnonce']) ? (int) $_POST['idAnnonce'] : null;
        $dao = new AnnonceDao($this->getPdo());
        $annonce = $dao->findAssoc($id);
        $array = [
            'idLivraison'        => null,
            'ville'              => $_POST['ville'] ?? null,
            'pays'               => $_POST['pays'] ?? null,
            'adresse'            => $_POST['adresse'] ?? null,
            'codePostal'         => $_POST['codePostal'] ?? null,
            'dateCommande'       => date('Y-m-d'),
            'dateLivraison'      => null,
            'dateReception'      => null,
            'idAnnonce'          => isset($_POST['idAnnonce']) ? (int) $_POST['idAnnonce'] : null,
            'idCompteAcheteur'   => $_SESSION['idCompte'],
            'numeroDeSuivi'      => null,
            'status'             => null
        ];
        $dao = new LivraisonDao($this->getPdo());
        $livraison = $dao->hydrate($array);
        $dao->insertIntoDatabase($livraison);

        $validator = new Validator($this->reglesValidation);
        $donnesValides = $validator->valider($data);
        $messagesErreurs = $validator->getMessagesErreurs();

        if (!$donnesValides) {
            $template = $this->getTwig()->load('paiement.html.twig');
            echo $template->render([
                'erreurs' => $messagesErreurs,
                'donnees' => $data,
                'menu' => 'annonce'
            ]);
            return;
        }
        $template = $this->getTwig()->load('recapitulatif.html.twig');
        echo $template->render([
            'annonce' => $annonce,
            'livraison' => $livraison,
            'menu' => 'annonce'
        ]);
    }
}
