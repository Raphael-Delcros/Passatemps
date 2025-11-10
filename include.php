<?php

// Ajout de l'autoload de composer
require_once 'vendor/autoload.php';

require_once 'config/constantes.php';

// Ajout de twig    
require_once 'config/twig.php';

//Ajout des controlleurs
require_once 'controllers/controller.class.php';
require_once 'controllers/controller_categorie.class.php'; 
require_once 'controllers/controller_factory.class.php';    
require_once 'controllers/controller_jeu.class.php';
require_once 'controllers/controller_compte.class.php';
require_once 'controllers/controller_signalement.class.php';

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


?>