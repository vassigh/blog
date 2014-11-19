<?php


spl_autoload_register("my_autoload");

function my_autoload($class)
{

	$filepath = str_replace("_", "/", $class);
	$filepath .= '.php';
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


// $city=$db->query("select city from customers where country=?", array("France"));

//$city=$db->queryOne("select city from customers where country=?", array("France"));
// var_dump($city);


//$id=$db->execute("insert into customers(city, country) values (?,?)", array("Téhéran", "Iran"));
//var_dump($id);

//$city=$db->query("select city, country from customers where country=?", array("Iran"));

//print_r(utf8_decode($city[1]['city']) );


//$city=$db->queryOne("select nom from clients where nom=?", array("vassigh"));
//var_dump($city);
//print_r(utf8_decode($city['nom']) );


//$id=$db->execute("insert into clients(nom, prenom) values (?,?)", array("toto", "tata"));
//var_dump($id);

$news=$db->query("select * from news", array(""));
var_dump($news);

//$id=$db->execute("update clients SET nom=? where ident = 3", array("Dupont"));
//var_dump($id);

// $id=$db->execute("delete FROM clients where ident = 3", array(""));