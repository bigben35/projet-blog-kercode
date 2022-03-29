<?php

namespace ProjetBlogKercode\Models;

use Exception;

class Manager
{
    protected function dbConnect()  //protected car utiliser uniquement par Manager et les classes qui vont hériter de la classe Manager
    {
        $dbHost = "localhost";
        $dbName = "blog_islande";
        $username = 'root';
        $password = '';
        $charset = 'utf8mb4';

        try {
            $bdd = new \PDO("mysql:host=$dbHost;dbname=$dbName;charset=$charset",$username,$password);
            $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $bdd;
            

        } catch(Exception $e){
            die('Erreur: ' . $e->getMessage());
        }
    }
        }