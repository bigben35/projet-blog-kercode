<?php

namespace ProjetBlogKercode\Controllers;

require_once "app/Models/ArticleManager.php";

class AdminController
{
     // connexion à la page de connexion Admin
     function connexionUser()
    {
        if($_SESSION['role'] === "1"){
        require 'app/Views/Admin/dashboard.php';
 
        }
        else{
        require 'app/Views/front/errorLoading';
 
        }
    }

    // tableau de bord 
    function dashboard()
    {
        // compter nombre utilisateur 
        $countUser = new \ProjetBlogKercode\Models\ContactModel();
        $nbrUser = $countUser->countUser();

        // compter nombre article 
        $countArticle = new \ProjetBlogKercode\Models\ArticleManager();
        $nbrArticle = $countArticle->countArticle();

        // compter nombre mail 
        $countMail = new \ProjetBlogKercode\Models\ContactModel();
        $nbrMail = $countMail->countMail();

        // compter nombre commentaire 
        $countComment = new \ProjetBlogKercode\Models\ContactModel();
        $nbrComment = $countComment->countComment();

        require 'app/Views/Admin/dashboard.php';
        
    }



    // ------------------GESTION DES MEMBRES--------------

    public function afficherListeMembre()
    {
        $users = new \ProjetBlogKercode\Models\ContactModel();
        $allUsers = $users->getMembre();

        require 'app/Views/Admin/listeMembre.php';
    }


    //============== montrer un membre =====================
    function montrerMembre($id)
    {
        $user = new \ProjetBlogKercode\Models\ContactModel();
        $oneUser = $user->afficherMembre($id);

        require 'app/Views/Admin/membre.php';
    }
    /*=========================== bannir un membre ==================================*/
    function bannirMembre($id)
    {
        $deleteUser = new \ProjetBlogKercode\Models\ContactModel();
        $deleteOneUser = $deleteUser->bannirUnMembre($id);

        header('Location: listeMembre');
    } 
    
    
    // ----------------GESTION DES ARTICLES-----------------

    private $articleManager;//accessible attribut de l'Objet

    public function __construct(){
        $this->articleManager = new \ProjetBlogKercode\Models\ArticleManager;
        $this->articleManager->chargementArticles();
    }
    // page liste articles 
    public function afficherListeArticle()
    {
        $articles = $this->articleManager->getArticles();
        // var_dump($articles);die;
        require 'app/Views/Admin/listeArticle.php';
    }

    public function afficherArticle($id)
    {
        $articleData = $this->articleManager->getArticleById($id);
        $article = new \ProjetBlogKercode\Models\Article($articleData['id'], $articleData['title'], $articleData['url_image'], $articleData['alt_image'], $articleData['accroche'], $articleData['content'], $articleData['created_at']);
        // var_dump($article); die;
        require "app/Views/Admin/afficheArticle.php";
    }
    
    public function ajouterArticle()
    {
        $recupCategory = new \ProjetBlogKercode\Models\ArticleManager;
        $categories = $recupCategory->afficheCategory();
        require "app/Views/Admin/ajoutArticle.php";
    }

    //ajout article en BDD
    public function validerAjoutArticle()
    {
        $image = $_FILES['url_image'];
        $repertoire = "app/Public/images/";
        $imageAjoute = $this->ajoutImageArticle($image, $repertoire);
        $this->articleManager->ajoutArticleBD($_POST['title'], $_POST['accroche'], $_POST['content'], $imageAjoute, $_POST['alt_image']);
      
    
        header('Location: listeArticle');
    
    }

    // supprimer un article
    public function supprimerArticle($id)
    {
        $dataArticle = $this->articleManager->getArticleById($id);
        unlink("app/Public/images/".$dataArticle['url_image']);
        $this->articleManager->suppressionArticleBD($id);

        header('Location: listeArticle');
    }


    
    public function modifierArticle($id)
    {
        $modifArticle = $this->articleManager->getArticleById($id);
        $article = new \ProjetBlogKercode\Models\Article($modifArticle['id'], $modifArticle['title'], $modifArticle['url_image'], $modifArticle['alt_image'], $modifArticle['accroche'], $modifArticle['content'], $modifArticle['created_at']);
        
        require 'app/Views/Admin/modifierArticle.php';
    }


    //modifier un article
    public function validerModifArticle()
    {
        $imageActuelle = $this->articleManager->getArticleById(filter_var($_POST['identifiant'], FILTER_SANITIZE_NUMBER_INT));
        $image = $_FILES['url_image'];

        if($image['size'] > 0){
            unlink("app/Public/images/".$imageActuelle);
            $repertoire = "app/Public/images/";
            $imageAjoute = $this->ajoutImageArticle($image, $repertoire);
        } else {
            $imageAjoute = $imageActuelle;
        }
        $this->articleManager->modificationArticleBD($_POST['identifiant'],$_POST['title'],$_POST['accroche'],$_POST['content'],$imageAjoute,$_POST['alt_image']);

        header('Location: listeArticle');
    }


    public function ajoutImageArticle()
    {
        if(isset($_FILES['url_image'])){
            $tmpName = $_FILES['url_image']['tmp_name'];
            $name = $_FILES['url_image']['name'];
            $size = $_FILES['url_image']['size'];
            $error = $_FILES['url_image']['error'];
            $type = $_FILES['url_image']['type'];
    
    
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
    
            // tableau des extensions autorisées
            $extensionsAutorisees = ['jpg', 'jpeg', 'png','gif', 'webp'];
            $tailleMax = 15000000;
    
            if(in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0){
    
                $uniqueName = uniqid('', true);
        
                $imageName = filter_var($uniqueName. '.' .$extension);
                $imageAjoute = filter_var('app/Public/images/' . $imageName, FILTER_SANITIZE_SPECIAL_CHARS);
                //mettre image dans dossier images du Blog avec nom unique
                move_uploaded_file($tmpName, $imageAjoute);
                return $imageAjoute;
            }
            else{
                echo "La taille de votre image est trop importante et/ou mauvaise extension de l'image";
            }
        }
    }


    // GESTION DES COMMENTAIRES 
    public function afficherListeCommentaire()
    {
        $comments = new \ProjetBlogKercode\Models\ContactModel();
        $allComments = $comments->getComments();

        require 'app/Views/Admin/listeCommentaire.php';
    }


    //============== montrer un commentaire =====================
    function montrerComment($id)
    {
        $comment = new \ProjetBlogKercode\Models\ContactModel();
        $oneComment = $comment->afficherCommentaire($id);

        require 'app/Views/Admin/commentaire.php';
    }
    /*=========================== supprimer un commentaire ==================================*/
    function supprimerComment($id)
    {
        $deleteComment = new \ProjetBlogKercode\Models\ContactModel();
        $deleteOneComment = $deleteComment->supprimerUnCommentaire($id);

        header('Location: listeCommentaire');
    }



    // GESTION DES MAILS 
    public function afficherListeMail()
    {
        $mails = new \ProjetBlogKercode\Models\ContactModel();
        $allMails = $mails->getMails();

        require 'app/Views/Admin/listeMail.php';
    }

    
    //============== montrer un mail =====================
    function montrerMail($id)
    {
        $mail = new \ProjetBlogKercode\Models\ContactModel();
        $oneMail = $mail->afficherMail($id);

        require 'app/Views/Admin/mail.php';
    }
    /*=========================== supprimer un mail ==================================*/
    function supprimerMail($id)
    {
        $deleteMail = new \ProjetBlogKercode\Models\ContactModel();
        $deleteEmail = $deleteMail->supprimerUnMail($id);

        header('Location: listeMail');
    }


   

}

    

