<?php

use Symfony\Component\Yaml\Yaml;

class Config
{
    // Attributs
    private static $instance = null;

    // Constructeur privé pour empêcher l'instanciation
    private function __construct()
    {
        self::$instance = Yaml::parseFile(__DIR__ . '/constantes.yaml');
    }

    //Fonctions
    public static function get()
    {
        if (self::$instance == null) {
            new Config();
        }
        return self::$instance;
    }
}
