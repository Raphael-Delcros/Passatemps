<?php

/**
 * @file controller_vendre.class.php
 * @brief Affiche les pages liées à la vente de jeux
 * 
 */

/**
 * @brief Classe Controller pour la Vente de jeux
 */
class ControllerVendre extends controller
{

    public array $reglesValidation;

    public function __construct(Twig\Environment $twig, Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
        $config = Config::get();
        $this->reglesValidation = [
            'titre' => [
                'obligatoire' => true,
                'type' => 'string',
                'longueurMin' => 5,
                'longueurMax' => 100,
            ],
            'jeu' => [
                'obligatoire' => true,
                'type' => 'string',
            ],
            'description' => [
                'obligatoire' => true,
                'type' => 'string',
                'longueurMin' => 10,
                'longueurMax' => 200,
            ],
            'prix' => [
                'obligatoire' => true,
                'type' => 'float',
            ],
            'etatJeu' => [
                'obligatoire' => true,
                'type' => 'string',
                'valeurs_acceptables' => ['Neuf', 'Très bon état', 'Bon état', 'Abimé', 'Manque des pieces'],
            ],
        ];
    }


    /**
     * @brief Affiche un formulaire de vente si l'utilisateur est connecté
     * 
     *
     * @return void
     */
    public function creer()
    {

        if (isset($_SESSION['idCompte'])) {
            $template = $this->getTwig()->load('vendre.html.twig');
            echo $template->render();
        } else {
            $template = $this->getTwig()->load('connexion.html.twig');
            echo $template->render();
        }
    }

    /**
     * @brief Ajoute une annonce de vente dans la base de données
     * 
     * @todo Changer idCommpteVendeur quand les comptes seront faits, Faire id jeu quand la recherche et la récuperation d'id sera faite
     * @todo Autocomplétion de Jeu dans le formulaire de vente
     * @return void
     */
    public function confirmerVente()
    {
        $data = $_POST;

        $date = getdate();
        $stringdate =  $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];

        $dao = new AnnonceDao($this->getPdo());
        $idAnnonce = $dao->lastId();

        $annonce = new Annonce(
            intval($idAnnonce),
            $data['titre'],
            $data['description'],
            $data['prix'],
            $stringdate,
            $data['etatJeu'],
            'en Vente', //etatVente
            intval($data['idJeu']),
            1             // idCompteVendeur → à remplacer plus tard
        );
        //à changer IdCompteVendeur quand les comptes seront faits
        //Faire id jeu quand la recherche et la récupération d'id serai faite

        $result = $dao->InsertInto($annonce);
        $template = $this->getTwig()->load('confirmation.html.twig');
        echo $template->render([
            'success' => $result
        ]);
    }

    /**
     * @brief Affiche le récapitulatif de l'annonce avant confirmation
     * 
     *
     * @return void
     */
    public function recap()
    {
        // On récupère tout le formulaire
        $data = $_POST;

        // Validation des données
        $validator = new Validator($this->reglesValidation);
        $donneesValides = $validator->valider($data);
        $messagesErreurs = $validator->getMessagesErreurs();
        
        $jeux = new JeuDao($this->getPdo());
        $jeu = $jeux->find(intval($data['idJeu']));

        // Verification que le jeu existe. Fonctionne SEULEMENT si on utilise la prédiction (recherche) du jeu.
        if ($jeu) {
            $data['jeu'] = $jeu->getNom();
        } else {
            $messagesErreurs[] = "Le jeu sélectionné est invalide.";
        }
        
        if (!$donneesValides || !empty($messagesErreurs)) {
            // S'il y a des erreurs, on réaffiche le formulaire avec les messages d'erreur
            $template = $this->getTwig()->load('vendre.html.twig');
            echo $template->render([
                'erreurs' => $messagesErreurs,
                'donnees' => $data
            ]);
            return;
        }



        // On envoie à Twig pour affichage du résumé
        $template = $this->getTwig()->load('recapVente.html.twig');
        echo $template->render([
            'annonce' => $data
        ]);
    }
}
