<?php

// Ajout du code commun à toutes les pages
require_once 'include.php';

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
