<?php ob_start(); ?>

<h1>Error!</h1>

<?php
$content = ob_get_clean();
require 'template/template.php';
?>