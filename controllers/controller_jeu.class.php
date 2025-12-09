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

    // Affiche un seul jeu
    public function afficher()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $dao = new JeuDao($this->getPdo());
        $jeu = $dao->find($id);

        $template = $this->getTwig()->load('jeu.html.twig');
        echo $template->render([
            'jeu' => $jeu,
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

    private function generateThumbnail(string $srcPath, string $destPath, int $maxW = 300, int $maxH = 200): bool
    {
        if (!file_exists($srcPath)) {
            return false;
        }

        $info = @getimagesize($srcPath);
        if ($info === false) {
            return false;
        }

        [$width, $height, $type] = $info;

        // Création image source selon type
        switch ($type) {
            case IMAGETYPE_JPEG:
                $srcImg = @imagecreatefromjpeg($srcPath);
                $saveFunc = 'imagejpeg';
                $saveQuality = 85;
                break;
            case IMAGETYPE_PNG:
                $srcImg = @imagecreatefrompng($srcPath);
                $saveFunc = 'imagepng';
                $saveQuality = 6;
                break;
            default:
                return false;
        }

        if (!$srcImg) {
            return false;
        }

        // Strategy "cover" : redimensionner pour remplir puis recadrer au centre
        $ratio = max($maxW / $width, $maxH / $height); // scaler pour couvrir la zone
        $interW = (int) round($width * $ratio);
        $interH = (int) round($height * $ratio);

        // image intermédiaire redimensionnée
        $inter = imagecreatetruecolor($interW, $interH);

        // gestion transparence pour PNG/GIF sur l'image intermédiaire
        if ($type == IMAGETYPE_PNG) {
            imagecolortransparent($inter, imagecolorallocatealpha($inter, 255, 255, 255, 127));
            imagealphablending($inter, false);
            imagesavealpha($inter, true);
        }

        imagecopyresampled($inter, $srcImg, 0, 0, 0, 0, $interW, $interH, $width, $height);

        // vignette finale taille fixe
        $thumb = imagecreatetruecolor($maxW, $maxH);

        // gestion transparence pour PNG/GIF sur la vignette finale
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
            imagealphablending($thumb, false);
            imagesavealpha($thumb, true);
        }

        // recadrage centré depuis l'intermédiaire
        $srcX = (int) round(($interW - $maxW) / 2);
        $srcY = (int) round(($interH - $maxH) / 2);
        imagecopy($thumb, $inter, 0, 0, $srcX, $srcY, $maxW, $maxH);

        // Sauvegarde
        $saved = false;
        switch ($type) {
            case IMAGETYPE_JPEG:
                $saved = $saveFunc($thumb, $destPath, $saveQuality);
                break;
            case IMAGETYPE_PNG:
                $saved = $saveFunc($thumb, $destPath, $saveQuality);
                break;
        }

        imagedestroy($srcImg);
        imagedestroy($inter);
        imagedestroy($thumb);

        return $saved;
    }
    
    public function ajouter()
    {
        $template = $this->getTwig()->load('backOffice.html.twig');
        echo $template->render();
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
        
        if(!empty($_POST["submit"])){
            // Connexions à la base de données
            $daoJeu = new JeuDao($this->getPdo());
            $daoPhoto = new PhotoDao($this->getPdo());
            
            // Création de la photo 
            $photo = new Photo();
            $urlPhoto = strip_tags($_FILES['photo']['name']);
            $photo->setUrl($urlPhoto);
            
            
            var_dump($photo);
            if ($daoPhoto->exists($photo->getUrl())){
                // Gérer le cas où la photo existe déjà 
                $template = $this->getTwig()->load('erreur.html.twig');
                echo $template->render([
                    'message' => 'La photo existe déjà dans la base de données.'
                ]);
                return;
            }
            $daoPhoto->addToDatabase($photo);
            
            
            // Insertion du Jeu.
            $jeu = new Jeu();
            $jeu->setNom(strip_tags($_POST['jeu']));
            $jeu->setDescription(strip_tags($_POST['description']));
            $jeu->setContenu(strip_tags($_POST['contenu']));
            // Faire les catégories
            $jeu->setNbJoueursMin(strip_tags($_POST['nbJoueursMin']));
            $jeu->setNbJoueursMax(strip_tags($_POST['nbJoueursMax']));
            $jeu->setDateSortie(strip_tags($_POST['dateSortie']));
            
            if (!empty($_POST['extensionDe'])){
                $jeu->setIdJeuPrincipal(strip_tags($_POST['extensionDe'] ?: null));
            }
            $jeu->setIdPhoto($daoPhoto->getIdFromUrl($urlPhoto));
            $jeu->setDureePartie(strip_tags($_POST['dureePartie']));

            $daoJeu->addToDatabase($jeu);


            $template = $this->getTwig()->load('backOffice.html.twig');
            echo $template->render();
        }
    }
}