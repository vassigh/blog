      <?php
        require_once ('includes/autoload.php');
        $posts = new Model_Post();
        $bouton_modif='';
        $id_news = $_GET['id'];


        if (  array_key_exists("nom", $_POST)     && !empty($_POST["nom"])      &&
              array_key_exists("prenom", $_POST) && !empty($_POST["prenom"])    &&
              array_key_exists("commentaire", $_POST)   && !empty($_POST["commentaire"])  )
        {
            $nom          = $_POST["nom"];
            $prenom       = $_POST["prenom"];
            $commentaire  = $_POST["commentaire"];

            $id = $posts->insertCommentaire($_GET['id'], $nom, $prenom, $commentaire);
            header("location:contenu.php?id=$id_news");
            exit;
        }

include 'commentaire.phtml';



        
