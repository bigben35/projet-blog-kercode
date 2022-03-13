<?php

namespace ProjetBlogKercode\Controllers;

class adminController
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
}