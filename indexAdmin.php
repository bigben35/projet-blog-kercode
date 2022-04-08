<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

//chargement automatique avec composer
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try 
{

    $backController = new \ProjetBlogKercode\Controllers\AdminController();//objet controler, on instancie la class adminController (copie de la class adminController)
    //on le stocke dans une variable pour pouvoir l'utiliser

    
    if (isset($_GET['action'])) { //$_GET donne les valeurs des informations indiquées dans l'url
        
        // dasboard 
        if($_GET['action'] == 'dashboard'){
            $backController->dashboard();
        }

        elseif($_GET['action'] == 'listeArticle'){
            $backController->afficherListeArticle();
        }

        elseif($_GET['action'] == 'afficheArticle'){
            $backController->afficherArticle($_GET['id']);
        }

        elseif($_GET['action'] == 'ajouterArticle'){
            $backController->ajouterArticle();
        }

        elseif($_GET['action'] == 'validerAjoutArticle'){
            $backController->validerAjoutArticle();
        }
        

    } else {
        $backController->dashboard();
    }


} catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        require 'app/Views/Front/errorLoading.php'; 
}