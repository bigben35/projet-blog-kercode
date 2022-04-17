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