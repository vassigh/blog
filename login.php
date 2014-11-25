<?php

require_once ('includes/autoload.php');
$users = new Model_Post();

    // Vérification email et password

	$err_email = true;

    if (  array_key_exists("email", $_POST)    && !empty($_POST["email"]) &&
     	  array_key_exists("pass", $_POST)     && !empty($_POST["pass"])  )
    {
        $email  = $_POST["email"];
        $pass   = $_POST["pass"];
    	$user_id = $users->searchUser($email,$pass);
    	if ($user_id)
    	{
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['admin'] = 'n';
            if ($email == 'cvassigh@wanadoo.fr') $_SESSION['admin'] = 'o';  // pour l'administration
    		header("Location: index.php");
   			exit; 
    	}
    	else
    	{
    		$err_email = false;
    	}

    }

include 'login.phtml';







