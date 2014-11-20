<?php
class Model_Post
{
    private $db;


    public function __construct()
    {
        $this->db = new Helper_Database();

    }
    public function getPost($id)
    {
        $nom=$this->db->queryOne("select * from news where id=$id", array(""));
        return $nom;

    }

    public function getLatestPosts($number=0)
    {
        if ($number == 0)
        {
            $nom=$this->db->query("select * from news order by dateAjout", array(""));
        }
        else
        {
                 $nom=$this->db->query("select * from news order by dateAjout limit $number", array(""));

        }
        return $nom;

    }

    public function insertPost($auteur, $titre, $contenu, $categorie)
    {
        $id=$this->db->execute("insert into news(auteur, titre, contenu, categorie, dateModif) values (?,?,?,?,CURRENT_TIMESTAMP)", array("$auteur", "$titre", "$contenu","$categorie" ));
        return $id;

    }

    public function deletetPost($id)
    {
        $id=$this->db->execute("delete FROM news where id = $id", array(""));
        return $id;

    }

    public function updatePost($id, $auteur, $titre, $contenu, $categorie)
    {
        $id=$this->db->execute("update news SET auteur=?, titre=?, contenu?, categorie=? where id = $id", array("$auteur", "$titre", "$contenu","$categorie" ));
        return $id;

    }

    //$id=$db->execute("update clients SET auteur=?, titre=?, contenu?, where ident = 3", array("Dupont"));

}

