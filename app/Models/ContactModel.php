<?php

namespace ProjetBlogKercode\Models;

class ContactModel extends Manager
{
    public function postMail($lastname, $firstname, $mail, $phone, $objet, $msg)
    {
        $bdd = $this->dbConnect();
        $request = $bdd->prepare('INSERT INTO contacts(lastname, firstname, mail, phone, objet, msg) VALUE(:lastname, :firstname, :mail, :phone, :objet, :msg)');
        
        $request->execute(array(
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':mail' => $mail,
            ':phone' => $phone,
            ':objet' => $objet,
            ':msg' => $msg));
        return $request;
    }



    // ==================afficher les utilisateurs (hors admin) =========
    public function getMembre()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, pseudo, mail, avatar, created_at FROM user WHERE role=0");
        $req->execute(array());

        return $req;

    }

    public function countUser()
    {
       $bdd = $this->dbConnect();
       $req = $bdd->prepare('SELECT COUNT(id) FROM user WHERE id');
       $req->execute(array());
       return $req;
    }

       //================== afficher un membre ================
       public function afficherMembre($id)
       {
          $bdd = $this->dbConnect();
          $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
          $req->execute(array($id));
          return $req->fetch();
       }
   
   
      //  ============bannir un membre (si ne respecte pas les règles) ==============
      public function bannirUnMembre($id)
      {
          $bdd = $this->dbConnect();
          $req = $bdd->prepare('DELETE FROM user WHERE id = ?');
          $req->execute(array($id));
          return $req;
      }




    // ----------afficher les commentaires -------------
    public function getComments()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT commentaires.*, user.pseudo, article.title FROM commentaires 
        INNER JOIN user ON commentaires.id_user = user.id 
        INNER JOIN article ON commentaires.id_article = article.id
        ORDER BY id DESC");
        $req->execute(array());

        $allComments = $req->fetchAll();
        // var_dump($allComments);die;

        return $allComments;
    }

    /*================================ nombres de commentaires ====================================*/

    public function countComment()
    {
       $bdd = $this->dbConnect();
       $req = $bdd->prepare('SELECT COUNT(id) FROM commentaires WHERE id');
       $req->execute(array());
       return $req;
    }

   //================== afficher un commentaire ================
    public function afficherCommentaire($id)
    {
       $bdd = $this->dbConnect();
       $req = $bdd->prepare('SELECT * FROM commentaires WHERE id = ?');
       $req->execute(array($id));
       return $req->fetch();
    }


   //  ============supprimer un commentaire (si jugé non recevable) ==============
   public function supprimerUnCommentaire($id)
   {
       $bdd = $this->dbConnect();
       $req = $bdd->prepare('DELETE FROM commentaires WHERE id = ?');
       $req->execute(array($id));
       return $req;
   }





    // afficher les mails 
    public function getMails()
    {
        $bdd = $this->dbConnect();
        $request = $bdd->query("SELECT id, lastname, firstname, mail, phone, objet, msg FROM contacts ORDER BY id DESC");
        return $request;
    }

     /*================================ nombres de mail  ====================================*/

     public function countMail()
     {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(id) FROM contacts WHERE id');
        $req->execute(array());
        return $req;
     }

    //================== afficher un mail ================
     public function afficherMail($id)
     {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT *  FROM contacts WHERE id = ? ' );
        $req->execute(array($id));
        return $req->fetch();
     }


    //  ============supprimer un mail ==============
    public function supprimerUnMail($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM contacts WHERE id = ?');
        $req->execute(array($id));
        return $req;
    }


}