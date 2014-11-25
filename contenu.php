<?php

include 'includes/autoload.php';
include 'header.phtml';

$id = $_GET['id'];
$posts = new Model_Post();
$nompst = $posts->getPost($id);


  require_once ('includes/autoload.php');
  session_start();
  $users = new Model_Post();
  $user = $users->getUser($_SESSION['user_id']);

  echo '<section class="section_blog_contenu_news">';

  echo '<h1 style="text-align: center">' . $nompst['titre'] . '</h1>';
  
  echo '<div class="blog_contenu_news">';

  echo '<p class="contenu_titre">';
  if ($nompst['image'] != "")
  {
     echo'<img class="contenu_image" src="pictures/' . $nompst['image'] . '" alt="index"></img>' ;
  };

    echo 'Catégorie : ' . 
          '<span class="texte">'  . $nompst['libelle']  . '</span><br/>';

    echo 'Création : ' . '<span class="texte">'  . substr($nompst['dateAjout'],0,10)  . '</span>' .
         ' - Modification : '. '<span class="texte">'  . substr($nompst['dateModif'],0,10)  . '</span>' .
        '</p>';

  echo '<p class="contenu">' . $nompst['contenu']  . '</p>';
  echo '</div>';

  echo'<a class="blog_contenu_news_retour" href="post.php?page=' . $_SESSION["page"] .'" ><input type="button" value="Retour"> </a>';

  echo '</section>';

  $comments = new Model_Post();
  $comment = $posts->getCommentaires($nompst['id']);


  echo '<p>' . '<a href="commentaire.php?id=' . $nompst['id'] .'"> Commentaires </a>' . '</p>';
  for ($i=0; $i<count($comment); $i++)
    {
      echo '<p class="commentaire">' . $comment[$i]['commentaire'] .
      '<span class="nom_commentaire">' . 
      ' (' . $comment[$i]['nom'] . ' ' . $comment[$i]['prenom'] . ' )'  . '</span></p>';
    }



include 'footer.phtml';