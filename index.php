<?php
//empty — Détermine si une variable est vide
//isset — Détermine si une variable est déclarée et est différente de null
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try{
    $frontController = new \ProjetBlogKercode\Controllers\FrontController();//objet controler

    if(isset($_GET['action'])){
        if($_GET['action'] == 'contact'){
            $frontController->contact();
        }

        // envois mail dans la bdd 
        elseif ($_GET['action'] == 'contactPost') {
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $mail = htmlspecialchars($_POST['mail']);
            $phone = htmlspecialchars($_POST['phone']);
            $objet = htmlspecialchars($_POST['objet']);
            $msg = htmlspecialchars($_POST['msg']);
            if (!empty($lastname) && (!empty($firstname) && (!empty($mail) && (!empty($phone) && (!empty($objet) && (!empty($msg))))))) {
                $frontController->contactPost($lastname, $firstname, $mail, $phone, $objet, $msg);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis, A vous de jouer !!');
            }
        }

       
        
    }else{
        $frontController->home();
    }

} catch(Exception $e){
    require 'app/Views/front/errorLoading.php';
}