<?php

include 'header.phtml';

  // calendrier persan
  // require_once("PersianCalendar.php");

  session_start();
  if (!isset($_SESSION['user_id']))
  {
    header("location:login.php");
    exit;
  }

  if ($_SESSION['admin'] == 'o')
  {
    echo '<p><a href="admin.php">Accéder à ' . "l'espace" . "d'administration</a></p>";
  }

  require_once ('includes/autoload.php');

  if (isset($_GET["page"])) 
  {
    $_SESSION["page"] = $_GET["page"];
  }
  else
  {
    $_SESSION["page"] = 1;          
  } 

  $users = new Model_Post();
  $user = $users->getUser($_SESSION['user_id']);

  echo '<h1 style="text-align: center; margin-bottom: 5px;">Mon blog personnel</h1>';
  echo '<h3 style="text-align: center; margin-bottom: 12px; margin-top: 0px;">Chidan Vassigh</h3>';

  // Calendrier
  echo  '<p class="calendrier">';
    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

    /* calendrier persan
    echo strftime("%A %d %B") . ' ' . date("Y") . '<br/>'; 
    echo mds_date("l j F Y");
    */
  echo '</p>';

  echo '<div class="main">';


    // --------------------------------------------------------------------------------------
    // ------------------------------------------ SECTION -------------------------------------
    // --------------------------------------------------------------------------------------  


    echo '<section class="section_blog_liste_news">';

    $posts = new Model_Post();

    if (isset($_GET['cherche']) )
    {
      $nompst = $posts->getLatestPosts(0, 0, $_GET['cherche']);
    }
    else
    {
      if (isset($_GET['categorie']) )
      {
        $nompst = $posts->getLatestPosts(0, 0, "", $_GET['categorie']);
      }
      else
      {
        $nompst = $posts->getLatestPosts(0, 0);  
      } 
    }      


    $limit= 4;              // limit de news par page
    $nbpages= intval(count($nompst)/$limit);
    if(count($nompst)%$limit > 0) $nbpages++;

    $p = 0;
    if(isset($_GET['page']))
    {
      $p = $limit * ($_GET['page']-1);
    }

    for ($offset=$p; $offset<count($nompst)+$limit; $offset+=$limit)
    {

      if (isset($_GET['cherche']) )
      {
        $nompst = $posts->getLatestPosts($limit, $offset, $_GET['cherche'], 0);
      }
      else
      {
        if (isset($_GET['categorie']) )
        {
          $nompst = $posts->getLatestPosts($limit, $offset, "", $_GET['categorie']);
        }
        else
        {
          $nompst = $posts->getLatestPosts($limit, $offset);  
        }              
      }

      for ($i=0; $i<count($nompst); $i++)
      { 

          echo '<div class="div_blog_liste_news">';

          if ($nompst[$i]['image'] != "")
          {
             echo'<img class="image_blog_liste_news" src="pictures/' . $nompst[$i]['image'] . '" alt="index"></img>' ;
          }

          echo '<p class="categorie_blog_liste_news">'  .  $nompst[$i]['libelle'] . '</p>'; 

          $tags = $posts->getTagsFormate($nompst[$i]['id']);

          if ($tags != "") echo '<p class="tags_blog_liste_news">' . $tags . '</p>';

          echo '<p class="titre_blog_liste_news">';


          echo '<a href = "contenu.php?id=' . $nompst[$i]['id']   . '">' . $nompst[$i]['titre']  . '</a>' . '</p>';
          echo'<div class="clear"></div>';

          echo '<p class="texte_blog_liste_news">' .
             substr( $nompst[$i]['contenu'], 0, 100 ) . '</p>';

          echo '<p class="date_blog_liste_news">' .
                 'Création : ' . substr($nompst[$i]['dateAjout'],0,10) . ' à ' . substr($nompst[$i]['dateAjout'],12,8) 
                  . '<br/>' . 'Modification : ' . substr($nompst[$i]['dateModif'],0,10) . ' à ' . substr($nompst[$i]['dateModif'],12,8) .
                '</p>';

          echo '</div>';

           if ($i == $limit-1) break;

       }

       if ($i == $limit-1) break; 
    }

    echo '</section>';  // Fin section


    // ------------------------------------------
    // ----------------- Aside ------------------
    // ------------------------------------------            

    echo '<aside>';
            echo '<h1>Catégories</h1>' ;
            echo '<ul>';
              echo '<li><a href="post.php?categorie=3">Politique</a></li>';
              echo '<li><a href="post.php?categorie=8">Philosophie</a></li>';
              echo '<li><a href="post.php?categorie=1">Culture</a></li>';
              echo '<li><a href="post.php?categorie=5">Economie</a></li>';
              echo '<li><a href="post.php?categorie=4">Livres</a></li>';
            echo '</ul>';

    echo '</aside>';

 



  echo '</div>';   // fin div main



  // ------------------------------------------
  // ------------- Pied page ------------------
  // ------------------------------------------  



  echo '<div>';
  if ($nbpages > 0)
  {
    echo '<p class="blog_liste_news_page">Pages: ';
    for ($k=0; $k<$nbpages; $k++) 
    {
      $page=$k + 1;
      if ($page == 1)
      {
        echo '<a href="post.php?page=' . $page . '">' . '  ' . $page .  '</a>';
      }
      else
      {
         echo ' - ' . '<a href="post.php?page=' . $page . '">' . '  ' . $page .  '</a>';                 
      }
    }
    echo '</p>';
  }
  echo '</div>';



include 'footer.phtml';


