<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

//chargement automatique avec composer
require_once __DIR__ . '/vendor/autoload.php';

try 
{

    $backController = new \ProjetBlogKercode\Controllers\AdminController();//objet controler, on instancie la class adminController (copie de la class adminController)
    //on le stocke dans une variable pour pouvoir l'utiliser

    
    if (isset($_GET['action'])) { //$_GET donne les valeurs des informations indiquées dans l'url
        
        // création d'un administrateur 
        if($_GET['action'] == 'createAdmin'){
            $firstname = $_POST['firstname'];
            $mail = $_POST['mail'];
            $pass = $_POST['password'];
            $password = password_hash($pass, PASSWORD_DEFAULT); //crée une clé de hachage pour un password

            $backController->createAdmin($firstname, $mail, $password);
        }

        // connexion administrateur 
        elseif ($_GET['action'] == 'connexionAdmin'){
            $mail = htmlspecialchars($_POST['mail']);   //htmlspecialchars — Convertit les caractères spéciaux en entités HTML
            $password = $_POST['password'];
            if (!empty($mail) && !empty($password)){
                $backController->connexion($mail, $password); //on passe les 2 paramètres
            } else {
                throw new Exception("Veuillez renseigner vos identifiants pour vous connecter à votre session");
            }

        }

    } else {
        $backController->connexionAdmin();

    }


} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        require 'app/Views/Front/errorLoading.php'; 
}