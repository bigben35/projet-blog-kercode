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

       
        
    }else{
        $frontController->home();
    }

} catch(Exception $e){
    require 'app/Views/front/errorLoading.php';
}