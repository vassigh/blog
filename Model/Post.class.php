<?php
class Model_Post
{
    private $db;


        public function __construct()
    {
        $db = new Helper_Database();

    }
    public function getPost($id)
    {
        $nom=$this->db->queryOne("select auteur from news where id=1", array(""));
        return $nom;

    }
}