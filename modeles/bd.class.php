<?php

class Bd
{
    private static ?Bd $instance = null;

    private ?PDO $pdo;

    private function __construct()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . Config::get()['database']['host']
                    . ';dbname=' . Config::get()['database']['name'] . '; charset=utf8',
                Config::get()['database']['user'],
                Config::get()['database']['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            die('Connexion à la base de données échouée : ' . $e->getMessage());
        }
    }

    public static function getInstance(): Bd
    {
        if (self::$instance == null) {
            self::$instance = new Bd();
        }
        return self::$instance;
    }

    public function getConnexion(): PDO
    {
        return $this->pdo;
    }

    //empecherd de cloner l'objet
    private function __clone() {}

    //empecher de deserialiser l'objet
    public function __wakeup()
    {
        throw new Exception("Un singleton ne doit pas être deserialisé");
    }
} 