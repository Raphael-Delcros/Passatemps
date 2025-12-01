<?php
/**
 * @file legal.php
 * @brief Page affichant les mentions légales de l'application.
 * @todo Ecrire les mentions légales.
 */

// Ajout du code commun à toutes les pages
require_once 'include.php';

$template = $twig->load('legal.html.twig');
    echo $template->render();