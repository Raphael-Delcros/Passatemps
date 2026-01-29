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
    /**
     * @brief Constructeur
     */
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
     * @return void
     */
    public function confirmerVente()
    {
        // Récupérer les données depuis la session au lieu de $_POST
        $data = $_SESSION['annonce_temp'] ?? [];

        if (empty($data)) {
            $template = $this->getTwig()->load('confirmation.html.twig');
            echo $template->render(['success' => false]);
            return;
        }

        $daoAnnonce = new AnnonceDao($this->getPdo());
        $daoPhoto = new PhotoDao($this->getPdo());

        // 1. Ton ID que tu calcules et qui marche déjà 
        $monIdCalculé = $daoAnnonce->lastId();

        // 2. Création et insertion de l'annonce (Tu dis que ça, ça marche)
        $annonce = new Annonce(
            $monIdCalculé,
            $data['titre'],
            $data['description'],
            floatval($data['prix']),
            date('Y-m-d'),
            $data['etatJeu'],
            'enVente',
            intval($data['idJeu']),
            $_SESSION['idCompte'] ?? 1
        );

        $res = $daoAnnonce->InsertInto($annonce);

        // 3. L'IMAGE : On récupère le chemin depuis la session
        if ($res) {
            if (isset($_SESSION['temp_photo_path']) && !empty($_SESSION['temp_photo_path'])) {
                $photo = new Photo();
                $photo->setUrl($_SESSION['temp_photo_path']);
                $photo->setIdAnnonce($monIdCalculé);

                $daoPhoto->addToDatabase($photo);

                // Nettoyer la session
                unset($_SESSION['temp_photo_path']);
            }
            $result = true;
        } else {
            $result = false;
        }

        // Nettoyer les données temporaires
        unset($_SESSION['annonce_temp']);

        $template = $this->getTwig()->load('confirmation.html.twig');
        echo $template->render(['success' => $result]);
    }


    /**
     * @brief Affiche le récapitulatif de l'annonce avant confirmation
     * 
     *
     * @return void
     */
    public function recap()
    {
        $data = $_POST;
        $config = Config::get();

        // Gestion de l'upload de fichier
        if (isset($_FILES['photos']) && $_FILES['photos']['error'] === UPLOAD_ERR_OK) {
            $uploaddir = $config['application']['image_upload_path'];

            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0755, true);
            }

            $extension = pathinfo($_FILES['photos']['name'], PATHINFO_EXTENSION);
            $nomFichier = "temp_" . time() . "_" . rand(1000, 9999) . "." . $extension;
            $uploadfile = $uploaddir . $nomFichier;

            if (move_uploaded_file($_FILES['photos']['tmp_name'], $uploadfile)) {
                $data['urlPhoto'] = $uploadfile;
                // IMPORTANT : Stocker le chemin en session
                $_SESSION['temp_photo_path'] = $uploadfile;
            }
        }

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

        // Stocker toutes les données en session pour confirmerVente()
        $_SESSION['annonce_temp'] = $data;

        $template = $this->getTwig()->load('recapVente.html.twig');
        echo $template->render([
            'annonce' => $data
        ]);
    }
}
