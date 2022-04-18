<?php

$title = "Page montrant un membre inscrit sur le Blog 'Islande en tête'";
$description = "Page montrant un membre inscrit sur le Blog 'Islande en tête'";
ob_start();
?>

<section>

    <div>
        <h3><?= $oneUser['avatar'] ?></h3>
    </div>

    <div>
        <h3><?= $oneUser['pseudo'] ?></h3>
    </div>

    <div>
        <h3><?= $oneUser['mail'] ?></h3>
    </div>

    <div>
        <h3><?= $oneUser['created_at'] ?></h3>
    </div>


</section>



<?php $content = ob_get_clean(); ?>
<?php require 'template/adminTemplate.php';