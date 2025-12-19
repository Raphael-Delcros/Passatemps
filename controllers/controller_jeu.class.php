<?php

class ControllerJeu extends Controller
{
    public function __construct(\Twig\Environment $twig, \Twig\Loader\FilesystemLoader $loader)
    {
        parent::__construct($twig, $loader);
    }

    // Liste tous les Jeux
    public function lister()
    {
        $dao = new JeuDao($this->getPdo());
        $jeux = $dao->findAllAssoc(); // récupère tous les jeux en tableau associatif

        // Génération automatique des vignettes dans images/vignette/
        $imagesDir = Config::get()['application']['game_image_path'];
        $vignetteDir = Config::get()['application']['thumbnail_image_path'];

        if (!is_dir($vignetteDir)) {
            @mkdir($vignetteDir, 0755, true);
        }

        foreach ($jeux as $index => $jeu) {
            if (!isset($jeu['url']) || empty($jeu['url'])) {
                continue;
            }

            $filename = basename($jeu['url']);
            $srcPath = Config::get()['application']['game_image_path'] . $filename;
            $destPath = Config::get()['application']['thumbnail_image_path'] . $filename;

            if (!file_exists($srcPath)) {
                // source manquante : on peut sauter ou définir une vignette par défaut
                continue;
            }

            // Générer si la vignette n'existe pas ou si l'original a été modifié
            if (!file_exists($destPath) || filemtime($srcPath) > filemtime($destPath)) {
                $this->generateThumbnail($srcPath, $destPath, 300, 200);
            }
        }

        $template = $this->getTwig()->load('jeux.html.twig');
        echo $template->render([
            'jeux' => $jeux,
        ]);
    }
    /**
     * Affiche la page de détail d’un jeu ainsi que les annonces associées
     *
     * Cette méthode :
     * - récupère l'identifiant du jeu depuis la requête GET
     * - charge le jeu correspondant depuis la base de données
     * - récupère toutes les annonces liées à ce jeu
     * - transmet les données à la vue Twig
     *
     * @throws Exception Si l'identifiant du jeu est manquant ou si le jeu est introuvable
     * @return void
     */
    public function afficher()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (!$id) {
            throw new Exception("ID jeu manquant");
        }

        $jeuDao = new JeuDao($this->getPdo());
        $annonceDao = new AnnonceDao($this->getPdo());

        $jeu = $jeuDao->find($id);
        if (!$jeu) {
            throw new Exception("Jeu introuvable");
        }
        $annonces = $annonceDao->findByJeu($id);

        $template = $this->getTwig()->load('jeu.html.twig');
        echo $template->render([
            'jeu' => $jeu,
            'annonces' => $annonces
        ]);
    }


    public function autocomplete()
    {
        $q = $_GET['q'] ?? '';
        $dao = new JeuDao($this->getPdo());

        if ($q === '') {
            echo json_encode([]);
            exit;
        }

        $jeux = $dao->findWithName($q); // retourne un tableau associatif

        // On envoie seulement les infos utiles
        $resultats = array_map(function ($jeu) {
            return [
                'idJeu' => $jeu['idJeu'],
                'nom' => $jeu['nom'],
            ];
        }, $jeux);

        header('Content-Type: application/json');
        echo json_encode($resultats);
        exit;
    }

    public function rechercherPage()
    {
        $q = $_GET['q'] ?? '';
        $dao = new JeuDao($this->getPdo());

        $jeux = ($q === '') ? [] : $dao->research($q);

        $template = $this->getTwig()->load('recherche.html.twig');
        echo $template->render([
            'q' => $q,
            'jeux' => $jeux
        ]);
    }

    /**
     * Génère une vignette redimensionnée avec fond blanc
     *
     * @param string $srcPath Chemin de l'image source
     * @param string $destPath Chemin de la vignette à créer
     * @param int $maxW Largeur maximale de la vignette
     * @param int $maxH Hauteur maximale de la vignette
     * @return bool Succès ou échec de la génération
     */
    private function generateThumbnail(string $srcPath, string $destPath, int $maxW = 300, int $maxH = 200): bool
    {
        if (!file_exists($srcPath)) return false;
        $info = @getimagesize($srcPath);
        if (!$info) return false;
        [$width, $height, $type] = $info;

        $srcImg = match ($type) {
            IMAGETYPE_JPEG => @imagecreatefromjpeg($srcPath),
            IMAGETYPE_PNG  => @imagecreatefrompng($srcPath),
            default        => null
        };

        if (!$srcImg) return false;

        // 1. Créer le canevas aux dimensions fixes
        $thumb = imagecreatetruecolor($maxW, $maxH);

        // 2. FORCER LE FOND BLANC (au lieu du noir par défaut)
        $white = imagecolorallocate($thumb, 255, 255, 255);
        imagefilledrectangle($thumb, 0, 0, $maxW, $maxH, $white);

        // 3. Calcul du ratio pour garder les proportions
        $ratio = min($maxW / $width, $maxH / $height);
        $newW  = (int)round($width * $ratio);
        $newH  = (int)round($height * $ratio);

        // 4. Centrage
        $dstX = (int)round(($maxW - $newW) / 2);
        $dstY = (int)round(($maxH - $newH) / 2);

        // 5. Redimensionnement
        imagecopyresampled($thumb, $srcImg, $dstX, $dstY, 0, 0, $newW, $newH, $width, $height);

        // 6. Netteté
        $sharpen = [[-1, -1, -1], [-1, 16, -1], [-1, -1, -1]];
        $divisor = array_sum(array_map('array_sum', $sharpen));
        imageconvolution($thumb, $sharpen, $divisor, 0);

        // 7. Sauvegarde de la vignette
        $result = match ($type) {
            IMAGETYPE_JPEG => imagejpeg($thumb, $destPath, 90),
            IMAGETYPE_PNG  => imagepng($thumb, $destPath, 2),
            default        => false
        };

        imagedestroy($srcImg);
        imagedestroy($thumb);
        return $result;
    }
    public function ajouter()
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
     * Ajoute à la base de données le jeu ajouté
     *
     * @todo Ajouter la recherche du jeu pour l'extension comme dans la boite de Vendre
     * @todo Ajouter les catégories
     * @todo Ajouter la recherche des catégories
     * @todo Ajouter confirmation 
     * @return void
     */
    public function enregistrer()
    {

        if (!empty($_POST["submit"])) {
            // Connexions à la base de données
            $pdo = $this->getPdo();
            $daoJeu = new JeuDao($this->getPdo());
            $daoPhoto = new PhotoDao($this->getPdo());

            // Création de la photo 
            $urlPhoto = strip_tags($_FILES['photo']['name']);
            if (!$daoPhoto->exists($urlPhoto)) {
            $photo = new Photo();
            $photo->setUrl($urlPhoto);
            $daoPhoto->addToDatabase($photo);
            
            $destination = Config::get()['application']['game_image_path'] . $urlPhoto;
            move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
            }
            else {
                // Gérer le cas où la photo existe déjà 
                $template = $this->getTwig()->load('erreur.html.twig');
                echo $template->render([
                    'message' => 'La photo existe déjà dans la base de données.'    
                ]);
                return;
            }
            $idPhoto = $daoPhoto->getIdFromUrl($urlPhoto);


            //Création de l'objet Jeu
            $jeu = new Jeu(
            null, 
            strip_tags($_POST['jeu']),
            strip_tags($_POST['description']),
            strip_tags($_POST['contenu']),
            $_POST['nbJoueursMin'],
            $_POST['nbJoueursMax'],
            $_POST['dateSortie'],
            !empty($_POST['idJeuPrincipal']) ? $_POST['idJeuPrincipal'] : null, 
            $idPhoto,
            $_POST['dureePartie']
        );

        //Insertion et récupération de l'ID pour les catégories
        if ($daoJeu->addToDatabase($jeu)) {
            $idNouveauJeu = $pdo->lastInsertId();

            //Insertion des catégories dans la table cataloguer
            if (!empty($_POST['categories']) && is_array($_POST['categories'])) {
                foreach ($_POST['categories'] as $idCat) {
                    $sql = "INSERT INTO cataloguer (idJeu, idCategorie) VALUES (?, ?)";
                    $pdo->prepare($sql)->execute([$idNouveauJeu,$idCat]);
                }
            }
        }

        header("Location: index.php?controleur=jeu&methode=lister");
        }
    }
}
