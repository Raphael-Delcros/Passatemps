<?php

/**
 * @file controller_admin.class.php
 * @brief Contrôleur pour les actions administratives
 * 
 */
class ControllerAdmin extends Controller
{
    /**
     * @brief Constructeur avec vérification de rôle administrateur
     */
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);

        // Vérification de sécurité : on s'assure que la session est démarrée
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vérification du rôle
        if ($_SESSION['role'] !== 'administrateur') {
            header('Location: index.php');
            exit;
        }
    }
    /**
     * @brief Affiche le tableau de bord admin
     */
    public function dashboard()
    {
        $template = $this->getTwig()->load('admin_dashboard.html.twig');
        echo $template->render(
            [
                'prenom' => $_SESSION['prenom']
            ]
        );
    }
    /**
     * 
     * @brief Affiche le formulaire d'ajout de jeu
     */
    public function ajouterJeu()
    {
        // On récupère toutes les catégories pour les afficher dans le formulaire
        $daoCategorie = new CategorieDao($this->getPdo());
        $categories = $daoCategorie->findAll();

        $template = $this->getTwig()->load('backOffice.html.twig');
        echo $template->render([
            'categories' => $categories
        ]);
    }

    /**
     * @brief Pour lister tous les jeux avec options de modification/suppression
     */
    public function listeJeux()
    {
        $dao = new JeuDao($this->getPdo());
        $jeux = $dao->findAllAssoc();

        echo $this->getTwig()->render('admin_liste_jeux.html.twig', [
            'jeux' => $jeux
        ]);
    }

    /*  * @brief Supprime un jeu par son ID
     */
    public function supprimerJeu()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($id) {
            $dao = new JeuDao($this->getPdo());
            $dao->delete($id); // La méthode qu'on vient d'ajouter
        }
        header('Location: index.php?controleur=admin&methode=listeJeux');
        exit;
    }

    /** * @brief Affiche le formulaire de modification d'un jeu
     */
    public function formulaireModif()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (!$id) {
            header('Location: index.php?controleur=admin&methode=listeJeux');
            exit;
        }

        $dao = new JeuDao($this->getPdo());
        $jeuData = $dao->findAssoc($id); // On récupère les données sous forme de tableau

        echo $this->getTwig()->render('admin_form_jeu.html.twig', [
            'jeu' => $jeuData,
            'action' => 'modifier'
        ]);
    }

    /** @brief Traite la modification d'un jeu
     */
    public function modifierJeu()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dao = new JeuDao($this->getPdo());

            // On crée l'objet Jeu avec l'ID existant et les nouvelles données du POST
            $jeu = new Jeu(
                intval($_POST['idJeu']),
                $_POST['nom'],
                $_POST['description'],
                $_POST['contenu'],
                intval($_POST['nbJoueursMin']),
                intval($_POST['nbJoueursMax']),
                $_POST['dateSortie'],
                !empty($_POST['idJeuPrincipal']) ? intval($_POST['idJeuPrincipal']) : null,
                !empty($_POST['idPhoto']) ? intval($_POST['idPhoto']) : null,
                $_POST['dureePartie'],
                $_POST['url'] // URL de la photo si nécessaire
            );

            if ($dao->update($jeu)) {
                header('Location: index.php?controleur=admin&methode=listeJeux&success=1');
            } else {
                echo "Erreur lors de la mise à jour.";
            }
            exit;
        }
    }

    /**
     * @brief Liste des annonces avec options de modification/suppression
     */
    public function listeAnnonces()
    {
        $dao = new AnnonceDao($this->getPdo());
        $annonces = $dao->findAllAssoc(); // Utilise ta méthode existante

        echo $this->getTwig()->render('admin_liste_annonces.html.twig', [
            'annonces' => $annonces
        ]);
    }

    /** * @brief Supprime une annonce par son ID
     */
    public function supprimerAnnonce()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($id) {
            $dao = new AnnonceDao($this->getPdo());
            $dao->delete($id);
        }
        header('Location: index.php?controleur=admin&methode=listeAnnonces');
        exit;
    }

    /** * @brief Affiche le formulaire de modification d'une annonce
     */
    public function formulaireModifAnnonce()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new AnnonceDao($this->getPdo());
        $jeuDao = new JeuDao($this->getPdo());

        $annonce = $dao->findAssoc($id); // Récupère les données de l'annonce
        $listeJeux = $jeuDao->findAllAssoc(); // Pour le menu déroulant des jeux

        echo $this->getTwig()->render('admin_form_annonce.html.twig', [
            'annonce' => $annonce,
            'jeux' => $listeJeux
        ]);
    }

    /** * @brief Traite la modification d'une annonce
     */
    public function modifierAnnonce()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dao = new AnnonceDao($this->getPdo());

            // Création de l'objet Annonce avec les données du formulaire
            $annonce = new Annonce(
                intval($_POST['idAnnonce']),
                $_POST['titre'],
                $_POST['description'],
                floatval($_POST['prix']),
                $_POST['datePub'],
                $_POST['etatJeu'],
                $_POST['etatVente'],
                intval($_POST['idJeu']),
                intval($_POST['idCompteVendeur']),
                $_POST['urlPhoto']
            );

            if ($dao->update($annonce)) {
                header('Location: index.php?controleur=admin&methode=listeAnnonces&success=1');
            } else {
                echo "Erreur lors de la modification.";
            }
            exit;
        }
    }

    /** * @brief Liste des comptes utilisateurs avec options de modification/suppression
     */
    public function listeComptes()
    {
        $dao = new CompteDao($this->getPdo());
        $comptes = $dao->findAllAssoc();

        echo $this->getTwig()->render('admin_liste_comptes.html.twig', [
            'comptes' => $comptes
        ]);
    }

    /** * @brief Affiche le formulaire de modification d'un compte
     */
    public function formulaireModifCompte()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new CompteDao($this->getPdo());
        $compte = $dao->findAssoc($id);

        echo $this->getTwig()->render('admin_form_compte.html.twig', [
            'compte' => $compte
        ]);
    }

    /** * @brief Traite la modification d'un compte
     */
    public function modifierCompte()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dao = new CompteDao($this->getPdo());

            // On crée l'objet avec les données du formulaire
            $compte = new Compte();
            $compte->setIdCompte(intval($_POST['idCompte']));
            $compte->setNom($_POST['nom']);
            $compte->setPrenom($_POST['prenom']);
            $compte->setEmail($_POST['email']);
            $compte->setRole($_POST['role']);

            $dao->update($compte);
            header('Location: index.php?controleur=admin&methode=listeComptes');
            exit;
        }
    }

    /** * @brief Supprime un compte par son ID
     */
    public function supprimerCompte()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($id) {
            $dao = new CompteDao($this->getPdo());
            $dao->delete($id);
        }
        header('Location: index.php?controleur=admin&methode=listeComptes');
        exit;
    }
}
