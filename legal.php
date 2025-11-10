<?php

// Ajout du code commun à toutes les pages
require_once 'include.php';

$template = $twig->load('legal.html.twig');
    echo $template->render();