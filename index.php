<?php

//Ajout du code commun à toutes les pages
require_once 'include.php';



$template = $twig->load('index.html.twig');
echo $template->render();
/*try{
    if (isset($_GET['controleur'])){
    $controleurName =$_GET['controleur'] ;
    }
    else{
        $controleurName = "" ;
    }

    if (isset($_GET['methode'])){
        $methode =$_GET['methode'] ;
    }
    else{
        $methode = "" ;
    }

    if ($controleurName == "" && $methode == ""){
        var_dump("ici");
        $controleurName = "Categorie" ;
        $methode = "lister" ;
    }

    if ( $controleurName =="" ) {
        throw new Exception("Le controleur n'est pas defini");
    }
    if ( $methode == "" ) {
        throw new Exception("Le methode n'est pas defini");
    }
}
catch(Exception $e){
    die("Erreur : ".$e->getMessage());
}

$controleur=ControllerFactory::getController($controleurName, $loader, $twig);

$controleur->call($methode);
*/

// try {
//     $controleurName = isset($_GET['controller']) ? $_GET['controller'] : 'compte';
//     $methode = isset($_GET['methode']) ? $_GET['methode'] : 'lister';

//     if ($controleurName == "") {
//         throw new Exception("Le controleur n'est pas défini");
//     }
//     if ($methode == "") {
//         throw new Exception("La méthode n'est pas définie");
//     }
// } catch (Exception $e) {
//     die("Erreur : " . $e->getMessage());
// }

// // Instanciation du controller selon le nom
// switch (strtolower($controleurName)) {
//     case 'compte':
//         $controleur = new ControllerCompte($twig, $loader);
//         break;
//     // tu peux ajouter d'autres controllers ici
//     default:
//         die("Controller inconnu : $controleurName");
// }

// // Appel de la méthode
// if (method_exists($controleur, $methode)) {
//     $controleur->$methode();
// } else {
//     die("Méthode inconnue : $methode");
// }
try {
    // Récupération du controller et de la méthode depuis l'URL
    $controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'signalement';
    $methode = isset($_GET['methode']) ? $_GET['methode'] : 'lister';

    if ($controllerName == "") {
        throw new Exception("Le controller n'est pas défini");
    }
    if ($methode == "") {
        throw new Exception("La méthode n'est pas définie");
    }

    // Instanciation du controller selon le nom
    switch (strtolower($controllerName)) {
        case 'signalement':
            $controller = new ControllerSignalement($twig, $loader);
            break;
        default:
            throw new Exception("Controller inconnu : $controllerName");
    }

    // Vérification et appel de la méthode
    if (method_exists($controller, $methode)) {
        $controller->$methode();
    } else {
        throw new Exception("Méthode inconnue : $methode");
    }

} catch (Exception $e) {
    echo "<h1>Erreur :</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
