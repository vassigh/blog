<?php

include 'includes/autoload.php';

$id = $_GET['id'];
$posts = new Model_Post();
$nompst = $posts->getPost($id);

include 'contenu.phtml';