<?php

// Ajout de l'autoload de composer
require_once 'vendor/autoload.php';


// Ajout de twig
require_once 'config/twig.php';
require_once 'config/config.php';

//Ajout du modèle qui gère la connexion mysql
require_once 'modeles/bd.class.php';

//Ajout des controlleurs
require_once 'controllers/controller.class.php';
require_once 'controllers/controller_categorie.class.php';
require_once 'controllers/controller_cataloguer.class.php';
require_once 'controllers/controller_factory.class.php';
require_once 'controllers/controller_jeu.class.php';
require_once 'controllers/controller_compte.class.php';
require_once 'controllers/controller_signalement.class.php';
require_once 'controllers/controller_publication.class.php';
require_once 'controllers/controller_photo.class.php';
require_once 'controllers/controller_annonce.class.php';
require_once 'controllers/controller_bannissement.class.php';
require_once 'controllers/controller_messagerie.class.php';
require_once 'controllers/controller_vendre.class.php';
require_once 'controllers/controller_livraison.class.php';

// Ajout des modeles
require_once 'modeles/bd.class.php';
require_once 'modeles/categorie.class.php';
require_once 'modeles/categorie.dao.php';
require_once 'modeles/jeu.class.php';
require_once 'modeles/jeu.dao.php';
require_once 'modeles/compte.class.php';
require_once 'modeles/compte.dao.php';
require_once 'modeles/signalement.class.php';
require_once 'modeles/signalement.dao.php';
require_once 'modeles/publication.class.php';
require_once 'modeles/publication.dao.php';
require_once 'modeles/bannissement.class.php';
require_once 'modeles/bannissement.dao.php';
require_once 'modeles/photo.class.php';
require_once 'modeles/photo.dao.php';
require_once 'modeles/annonce.dao.php';
require_once 'modeles/annonce.class.php';
require_once 'modeles/photo.class.php';
require_once 'modeles/photo.dao.php';
require_once 'modeles/messagerie.class.php';
require_once 'modeles/messagerie.dao.php';
require_once 'modeles/livraison.class.php';
require_once 'modeles/livraison.dao.php';

?>