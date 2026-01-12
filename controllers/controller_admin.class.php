<?php

class ControllerAdmin extends Controller
{
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

    public function dashboard()
    {
        $template = $this->getTwig()->load('admin_dashboard.html.twig');
        echo $template->render(
            [
                'prenom' => $_SESSION['prenom']
            ]
        );
    }

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
    public function listeJeux()
    {
        $dao = new JeuDao($this->getPdo());
        $jeux = $dao->findAllAssoc(); // Ta méthode exacte

        echo $this->getTwig()->render('admin_liste_jeux.html.twig', [
            'jeux' => $jeux
        ]);
    }

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

    // Affiche le formulaire avec les données existantes
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

    // Traite la modification
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
    public function listeAnnonces()
    {
        $dao = new AnnonceDao($this->getPdo());
        $annonces = $dao->findAllAssoc(); // Utilise ta méthode existante

        echo $this->getTwig()->render('admin_liste_annonces.html.twig', [
            'annonces' => $annonces
        ]);
    }

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
}
