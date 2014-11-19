<?php

spl_autoload_register("my_autoload");

function my_autoload($class)
{

  $filepath = str_replace("_", "/", $class);
  $filepath .= '.class.php';
  if (file_exists($filepath))
  {
    require_once($filepath);
  }
  else
  {
    error_log($class . ' not found');
  }
}

$db = new Helper_Database();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>TP Blog vassigh</title>
    <link rel="stylesheet" href="blog.css">
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />
    
  </head>
  
  <body>

   
    <p style="text-align: center">Liste des nouvelles :</p>

    <table>
        <tr>
          <th>Auteur</th>
          <th>Titre</th>
          <th>Contenu</th>
          <th>Date d'ajout</th>
          <th>Dernière modification</th>
          <th>Dernière modification</th>
          <th>Catégorie</th>
        </tr>
    </table>   



<?php
  $posts = new Model_Post();
  $nompst = $posts->getPost(1);

?>




    <!-- var_dump($nom); -->
    <!-- $nom=$db->queryOne("select auteur from news where id=1", array("")); -->

<!-- <?php
 //   echo utf8_decode($nom['auteur']);
?>

-->
 
  </body>
</html>