<?php

namespace ProjetBlogKercode\Models;

use Exception;

class Manager
{
    protected function dbConnect()  //protected car utiliser uniquement par Manager et les classes qui vont hériter de la classe Manager
    {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=blog_islande;charset=utf8', 'root', '');
            return $bdd;

        } catch(Exception $e){
            die('Erreur: ' . $e->getMessage());
        }
    }
}