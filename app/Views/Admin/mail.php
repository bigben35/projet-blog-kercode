<?php

$title = "Page montrant un mail reçu du Blog 'Islande en tête'";
$description = "Page montrant un mail reçu du Blog 'Islande en tête'";
ob_start();
?>

<section>


<div>
        <h3><?= $oneMail['created_at'] ?></h3>
    </div>
    <div>
        <h3><?= $oneMail['lastname'] ?> <?= $oneMail['firstname'] ?></h3>
    </div>

    <div>
        <h3><?= $oneMail['mail'] ?></h3>
    </div>

    <div>
        <h3><?= $oneMail['phone'] ?></h3>
    </div>

    <div>
        <h3><?= $oneMail['objet'] ?></h3>
    </div>

    <div>
        <P><?= $oneMail['msg'] ?></P>
    </div>


</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php'; 