<?php

namespace ProjetBlogKercode\Models;

class ContactModel extends Manager
{

    // envoi mail en bdd 
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



}