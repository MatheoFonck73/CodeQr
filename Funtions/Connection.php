<?php
class Connection
{
    private $Host = 'localhost';
    private $User = 'root';
    private $Password = '';
    private $Database = 'excel';
    private $Attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

    protected $db;

    public function connect()
    {
        try {
            
            $this->db = new PDO("mysql:host={$this->Host};dbname={$this->Database};charset=utf8", $this->User, $this->Password,$this->Attributes);
            
            return $this->db;

        } catch (PDOException $e) {

            echo 'Connection failed.' . $e->getMessage();
        }
    }
}

#creator: Mateo Fonseca