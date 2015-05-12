<?php

class DB{
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "edb";
    private $connect;
    
    public function konektimi(){
        // Create connection
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        // Check connection
        if (!$this->connect) {
            die("Connection failed!");
        }   
    }

    public function createDB(){
        // Create connection
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password);
        // Check connection
        if (!$this->connect) {
            die("Connection failed!");
        } 
        // Create database
        $sql = "CREATE DATABASE edb";
        if (mysqli_query($this->connect, $sql)) {
            echo "Database u krijua me sukses";
        } else {
            echo "Ka ndodhur gabim ne krijimin e databazes";
        }
        
        mysqli_close($this->connect);
    }
    
    public function createTblUser(){
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE user(Uid integer PRIMARY KEY AUTO_INCREMENT, Username varchar(25), Password varchar(160), Emri varchar(30), Mbiemri varchar(30), Prioriteti varchar(10))";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela User";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles User!";
        }
        
        mysqli_close($this->connect);
    }
    
    public function createTblUdhetimetBus(){
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE udhetimetBus(Id integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela UdhetimetBus";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles UdhetimetBus!";
        }
        
        mysqli_close($this->connect);
    }

    public function createTblUdhetimetAeroplan(){
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE udhetimetAeroplan(Id integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela UdhetimetAeroplan";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles UdhetimetAeroplan!";
        }
        
        mysqli_close($this->connect);
    }
    
    public function createTblLokacione(){
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE lokacione(Lid integer PRIMARY KEY AUTO_INCREMENT, Vendi varchar(50), Pershkrimi varchar(300), Foto varchar(50))";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela Lokacionet";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles Lokacionet!";
        }
        
        mysqli_close($this->connect);
    }
    
    public function Insert($sql){
        $this->konektimi();

        if (mysqli_query($this->connect, $sql)) {
            echo "U regjistrua";
        } else {
            echo "Ka ndodhur gabim ne regjistrim!";
        }
        
        mysqli_close($this->connect);
    }
    
}
?>
