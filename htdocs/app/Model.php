<?php

abstract class Model{
    //infos de la BDD
    private string $host = '172.16.238.10' ;
    private string $db_name = 'quizooo';
    private string $db_user = 'quizooo';
    private string $db_password = 'quizooo';

    //Connexion
    protected $_connexion;

    //info de requetes
    public string $table;
    public string $id;



    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table): void
    {
        $this->table = $table;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getConnexion()
    {
        $this->_connexion = null;

        try {
            $this->_connexion = new PDO("mysql:host=". $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
            $this->_connexion->exec('set names utf8');
        } catch (PDOException $exception) {
            echo 'Erreur de connexion à la BDD : '. $exception->getMessage();
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM " . $this->getTable();
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getOne(){
        $sql = "SELECT * FROM " . $this->getTable(). "WHERE id=" . $this->getId();
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }


}