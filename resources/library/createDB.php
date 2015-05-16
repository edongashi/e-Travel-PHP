<?php

class DB{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "edb";
    private $connect;

    public function konektimi() {
        // Create connection
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        // Check connection
        if (!$this->connect) {
            die("Connection failed!");
        }
    }

    public function createDB() {
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

    public function dropDB() {
        // Create connection
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password);
        // Check connection
        if (!$this->connect) {
            die("Connection failed!");
        }
        // Create database
        $sql = "DROP DATABASE edb";
        if (mysqli_query($this->connect, $sql)) {
            echo "Database eshte fshire me sukses";
        } else {
            echo "Ka ndodhur gabim ne fshirjen e databazes";
        }

        mysqli_close($this->connect);
    }

    public function createTblUser() {
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

    public function createTblUdhetimetBus() {
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE udhetimetBus(Rid integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela UdhetimetBus";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles UdhetimetBus!";
        }

        mysqli_close($this->connect);
    }

    public function createTblRezervoBus() {
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE rezervoBus(Id integer PRIMARY KEY AUTO_INCREMENT, Rid integer, Uid integer, Emri varchar(30), Mbiemri varchar(30), Ulese integer)";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela Rezervo Bus";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles Rezervo Bus!";
        }

        mysqli_close($this->connect);
    }

    public function createTblUdhetimetAeroplan() {
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE udhetimetAeroplan(Rid integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela UdhetimetAeroplan";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles UdhetimetAeroplan!";
        }

        mysqli_close($this->connect);
    }

    public function createTblRezervoAeroplan() {
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE rezervoAeroplan(Id integer PRIMARY KEY AUTO_INCREMENT, Rid integer, Uid integer, Emri varchar(30), Mbiemri varchar(30), Ulese integer)";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela Rezervo Aeroplan";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles Rezervo Aeroplan!";
        }

        mysqli_close($this->connect);
    }

    public function createTblLokacione() {
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
	public function createTblForumi() {
        $this->konektimi();
        // Create database
        $sql = "CREATE TABLE forumi(tblID integer PRIMARY KEY AUTO_INCREMENT, ChatID integer, Komentuesi varchar(50), Komenti varchar(300))";
        if (mysqli_query($this->connect, $sql)) {
            echo "U krijuar tabela Forumi";
        } else {
            echo "Ka ndodhur gabim ne krijimin e tabeles Forumi!";
        }

        mysqli_close($this->connect);
    }

    public function Insert($sql) {
        $this->konektimi();

        if (mysqli_query($this->connect, $sql)) {
            echo "U regjistrua";
        } else {
            echo "Ka ndodhur gabim ne regjistrim!";
        }

        mysqli_close($this->connect);
    }

    public function __get($name) {
        switch ($name) {
            case "lokacionet":
                return $this->Get("SELECT * FROM LOKACIONE");
                break;
            default: return null;
        }
    }

    public function Get($sql) {
        $this->konektimi();
        $array = array();
        $result = mysqli_query($this->connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($array, $row);
            }
        }

        mysqli_close($this->connect);

        return $array;
    }
}
?>