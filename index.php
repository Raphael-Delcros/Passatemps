<?php

// Ajout du code commun à toutes les pages
require_once 'include.php';

<<<<<<< HEAD


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
/*
=======
>>>>>>> a8e75ce0b2cd1f737e1e212be500a06db17eb660
try {
    // Récupération du contrôleur
    if (isset($_GET['controleur'])) {
        $controllerName = $_GET['controleur'];
    } else {
        $controllerName = '';
    }

    // Récupération de la méthode
    if (isset($_GET['methode'])) {
        $methode = $_GET['methode'];
    } else {
        $methode = '';
    }

    // Gestion de la page d'accueil par défaut
    if ($controllerName == '' && $methode == '') {
        $controllerName = 'signalement'; 
        $methode = 'lister';
    }

    if ($controllerName == '') {
        throw new Exception("Le contrôleur n'est pas défini");
    }

    if ($methode == '') {
        throw new Exception("La méthode n'est pas définie");
    }

    // Création du contrôleur via la factory
    $controller = ControllerFactory::getController($controllerName, $loader, $twig);

    // Vérifie que la méthode existe bien
    if (!method_exists($controller, $methode)) {
        throw new Exception("La méthode '$methode' n'existe pas dans le contrôleur '$controllerName'");
    }

    // Appel de la méthode
    $controller->call($methode);

} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
    */

// test pour les jeux

try{
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
        $controleurName = "Jeu" ;
        $methode = "lister" ;
    }

    if ( $controleurName =="" ) {
        var_dump("ici");
        throw new Exception("Le controleur n'est pas defini");
    }
    if ( $methode == "" ) {
        var_dump("ici");
        throw new Exception("Le methode n'est pas defini");
    }
}
catch(Exception $e){
    die("Erreur : ".$e->getMessage());
}

$controleur=ControllerFactory::getController($controleurName, $loader, $twig);

$controleur->call($methode);