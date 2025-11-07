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