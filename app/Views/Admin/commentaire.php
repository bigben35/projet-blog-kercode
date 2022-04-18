<?php

$title = "Page montrant un commentaire reçu du Blog 'Islande en tête'";
$description = "Page montrant un commentaire reçu du Blog 'Islande en tête'";
ob_start();
?>

<section>

    <div>
        <h3><?= $oneComment['created_at'] ?></h3>
    </div>

    <div>
        <h3><?= $oneComment['id_user'] ?></h3>
    </div>

    <div>
        <h3><?= $oneComment['id_article'] ?></h3>
    </div>

    <div>
        <h3><?= $oneComment['commentaire'] ?></h3>
    </div>


</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';