<?php

namespace ProjetBlogKercode\Controllers;

class AdminController extends Controller
{
    // connexion à la page connexion
    function createPageAdmin()
    {
        require 'app/Views/Admin/createAdmin.php';
    }

    //création de l'administrateur
    function createAdmin($firstname, $mail, $password)
    {
        $userManager = new \ProjetBlogKercode\Models\AdminModel();
        $user = $userManager->createAdmin($firstname, $mail, $password);

        require 'app/Views/Admin/createAdmin.php';
    }

    // connexion à la page de connexion
    function connexionAdmin()
    {
        require 'app/Views/Admin/connexionAdmin.php';
    }

    function connexion($mail, $password)
    // récupère le password
    {
        $userManager = new \ProjetBlogKercode\Models\AdminModel();
        $connectAdmin = $userManager->recupPassword($mail, $password);

        $result = $connectAdmin->fetch();
        $isPasswordOk = password_verify($password, $result['password']);

        // Les sessions permettent de conserver des variables sur toutes les pages de votre site même lorsque la page PHP a fini d'être générée.  
        $_SESSION['mail'] = $result['mail']; // transformation des variables recupérées en session
        $_SESSION['password'] = $result['password'];
        $_SESSION['id'] = $result['id'];
        $_SESSION['firstname'] = $result['firstname'];
        $_SESSION['role'] = $result['role'];


        if ($isPasswordOk) {

            require 'app/Views/Admin/dashboard.php';
        } 
        
        else {
            echo 'Un problème avec vos identifiants?';
            
        }


    }
}