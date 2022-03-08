<h1>hello</h1>
<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

//chargement automatique avec composer
require_once __DIR__ . '/vendor/autoload.php';

try 
{

    $backController = new \ProjetBlogKercode\Controllers\adminController();//objet controler, on instancie la class adminController (copie de la class adminController)
    //on le stocke dans une variable pour pouvoir l'utiliser

    
    if (isset($_GET['action'])) { //$_GET donne les valeurs des informations indiquées dans l'url
        
        if($_GET['action'] == 'createAdmin'){
            $firstname = $_POST['firstname'];
            $mail = $_POST['mail'];
            $pass = $_POST['password'];
            $password = password_hash($pass, PASSWORD_DEFAULT); //crée une clé de hachage pour un password

            $backController->createAdmin($firstname, $mail, $password);
        }

    } else {
        $backController->createPageAdmin();

    }


} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        require 'app/Views/front/errorLoading.php'; 
}