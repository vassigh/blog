<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>Administration</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="blog.css">
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
  </head>
  
  <body>
    <p><a href=".">Accéder à l'accueil du site</a></p>
    
    
      <?php
        require_once ('includes/autoload.php');
        $posts = new Model_Post();
        $bouton_modif='';

        session_start();
        $users = new Model_Post();
        $user = $users->getUser($_SESSION['user_id']);
        $tags="";

        echo '<section class="section_admin_blog">';


        if (  array_key_exists("titre", $_POST)     && !empty($_POST["titre"])      &&
              array_key_exists("categorie", $_POST) && !empty($_POST["categorie"])  &&
              array_key_exists("tags", $_POST)       && !empty($_POST["tags"])      &&
              array_key_exists("contenu", $_POST)   && !empty($_POST["contenu"]) )
        {

            $titre      = $_POST["titre"];
            $categorie  = $_POST["categorie"];
            $tags       = $_POST["tags"];
            $contenu    = $_POST["contenu"];

          if (!isset($_GET['modifier']) )
          {
            // Ajout
            $id = $posts->insertPost($_SESSION['user_id'], $titre, $contenu, $categorie);
  
            $pieces_tags   = explode(",", $tags);
            for ($i=0; $i<count($pieces_tags); $i++)
            {
              $id_tag = $posts->insertTag($id, $pieces_tags[$i]);
            }
            $tags="";
          }
          else
          {
            // Modifier
            $id = $posts->updatePost($_GET['modifier'], $titre, $contenu, $categorie);

            // Pour tags D'abord deleter tous les tags de id_news
            $id = $posts->deletetTags( $_GET['modifier'] );
            $pieces_tags   = explode(",", $tags);
            for ($i=0; $i<count($pieces_tags); $i++)
            {
              $id_tag = $posts->insertTag($_GET['modifier'], $pieces_tags[$i]);
            }

            $bouton_modif='o';
          }

        }

        $nompst = $posts->getLatestPosts(0,0);

        if (  isset($_GET['modifier']) ) 
        { 
          $modif=0;
          while ( $nompst[$modif]['id'] != $_GET['modifier'] )
           {
              $modif++;
           } 
           $tags = $posts->getTagsFormate($nompst[$modif]['id']);
        }
      ?>

      <div class="formulaire_admin">

        <?php
            if (  isset($_GET['modifier']) && $bouton_modif != 'o' ) 
            { 
              echo '<form action="admin.php?modifier=' . $_GET['modifier'] . '" method="post">';
            }
            else
            { 
              echo '<form action="admin.php" method="post">';
             }
        ?>


          <span class="ad_lib_1">Titre :  </span><input type="text" name="titre" size="80"
             value="<?php  
                          if ($bouton_modif == 'o')
                          {
                            echo '';
                          }
                          else
                          {
                          echo @$nompst[$modif]['titre'];
                          }
                  ?>"/><br />

           <span class="ad_lib_1">Catégorie : </span><input type="number" name="categorie" min="1" max="10"
              value="<?php  
                          if ($bouton_modif == 'o')
                          {
                            echo '';
                          }
                          else
                          {
                           echo @$nompst[$modif]['categorie'];
                          }
                   ?>"/><br />

           <span class="ad_lib_1">Tags : </span><input type="text" name="tags" min="1" size="50"
              value="<?php  
                          if ($bouton_modif == 'o')
                          {
                            echo '';
                          }
                          else
                          {
                           echo $tags;
                          }
                   ?>"/><br /><br />

          
            Contenu :<br /><textarea rows="40" cols="97" name="contenu"><?php

                        if ($bouton_modif == 'o')
                        { 
                          echo '';
                        }
                        else
                        {echo @$nompst[$modif]['contenu'];
                        }
                        ?></textarea><br /><br />  


            <?php
                if (  isset($_GET['modifier']) && $bouton_modif != 'o' ) 
                { 
                  echo '<input type="submit" value="Modifier" />';
                }
                else
                { 
                  echo '<input type="submit" value="Ajouter" />';
                }
            ?>

        </div>
        
    </form>
    
    <table>
      <tr class="ad_tr_liste">
        <td class="ad_td_titre">Titre</td>
        <td class="ad_td_cetegorie">Catég.</td>
        <td class="ad_td_date_ajout">Date d'ajout</td>
        <td class="ad_td_date_modif">Dernière modification</td>
        <td class="ad_td_action">Image</td>
        <td class="ad_td_action">Action</td>
      </tr>



      <?php

        echo '<p style="text-align: center">' . count($nompst) . ' nouvelles actuellement en ligne';
        for ($i=0; $i<count($nompst); $i++)
        {
          echo '<tr>';
          echo '<td class="ad_td_titre">'       . substr($nompst[$i]['titre'],0,40)      . '</td>';
          echo '<td class="ad_td_cetegorie">'   . $nompst[$i]['libelle']                 . '</td>';
          echo '<td class="ad_td_date_ajout">'  . substr($nompst[$i]['dateAjout'],0,10)  . '</td>';
          echo '<td class="ad_td_date_modif">'  . substr($nompst[$i]['dateModif'],0,10)  . '</td>';


          if ($nompst[$i]['image'] != "")
          {
            echo'<td class="ad_td_image"><img class="image" src="pictures/' . $nompst[$i]['image'] . '" alt="index"></img></td>' ;
          }
          else
          {
            echo '<td class="ad_td_image"></td>';  
          }
          echo '<td class="ad_td_action">'      .
               '<a href="?modifier='. $nompst[$i]['id'] . '">Modifier</a><br>
                <a href="supprimer.php?supprimer='. $nompst[$i]['id']. '">Supprimer</a><br>
                <a href="image.php?id_news_image='. $nompst[$i]['id']. '">Image</a>' . 
                '</td>';
          echo '</tr>';
        }
      ?>

    </table>

    </section>

  <script>tinymce.init({selector:'textarea'});</script>
  </body>
</html>


        
