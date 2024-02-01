<?php

class Database{

    private $connection;
    private $host = "localhost";
    private $username = "root";
    private $database = "agjensioni";
    private $password = "";
    private function createConnection(){
        try{
            $this->connection = new mysqli($this->host,$this->username,$this->password,$this->database);
        }catch(Exception $ex){
            echo 'connection failed' .$ex->getMessage();
        }    
        
    }


    public function getConnection(){
        $this->createConnection();
        return $this->connection;
    }

    

}



?>