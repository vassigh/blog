<?php

require_once ('includes/autoload.php');
$posts = new Model_Post();

include 'supprimer.phtml';

if (isset($_GET['supprimer']))
{
    $id = $posts->deletetPost( $_GET['supprimer'] );
}







