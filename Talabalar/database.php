<?php
class Database
{

    public $host = 'localhost';
    public $username = 'root';
    public $password = 'mr2344';
    public $dbname = 'dars14';
    public $connect;

    public function __construct()
    {
        $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    }

    public function connection()
    {
        return $this->connect;
    }

}

?>