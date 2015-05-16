<?php
require_once(__DIR__ . "/../config.php");

class repository extends db_connector {   
    public function __get($name) {
        switch ($name) {
            case "lokacionet":
                return $this->get_data("SELECT * FROM lokacione Where Reklam = 1");
            case "users":
                return $this->get_data("SELECT * FROM user");
            case "udhetimet_bus":
                return $this->get_data("SELECT * FROM udhetimetbus");
            case "udhetimet_aeroplan":
                return $this->get_data("SELECT * FROM udhetimetaeroplan");
            case "rezervimet_bus":
                return $this->get_data("SELECT * FROM rezervobus");
            case "rezervimet_aeroplan":
                return $this->get_data("SELECT * FROM rezervoaeroplan");
            case "forumi":
                return $this->get_data("SELECT * FROM forumi"); 
            default:
                return null;
        }
    }
}

class db_manager extends db_connector {
    public function create_db() {
        if ($this->connector_create_db()) {
            return "Database u krijua me sukses";
        } else {
            return "Ka ndodhur gabim ne krijimin e databazes";
        }
    }
    
    public function drop_db() {
        $sql = "DROP DATABASE edb";
        return $this->execute_query_msg($sql,
            "Database eshte fshire me sukses",
            "Ka ndodhur gabim ne fshirjen e databazes");
    }
    
    public function create_table_User() {
        $sql = "CREATE TABLE user(Uid integer PRIMARY KEY AUTO_INCREMENT, Username varchar(25), Password varchar(160), Emri varchar(30), Mbiemri varchar(30), Prioriteti varchar(10))";
        return $this->execute_query_msg($sql,
            "U krijuar tabela User",
            "Ka ndodhur gabim ne krijimin e tabeles User!");
    }
    
    public function create_table_UdhetimetBus(){
        $sql = "CREATE TABLE udhetimetBus(Rid integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        return $this->execute_query_msg($sql,
            "U krijuar tabela UdhetimetBus",
            "Ka ndodhur gabim ne krijimin e tabeles UdhetimetBus!");
    }
    
    public function create_table_RezervoBus(){
        $sql = "CREATE TABLE rezervoBus(Id integer PRIMARY KEY AUTO_INCREMENT, Rid integer, Uid integer, Emri varchar(30), Mbiemri varchar(30), Ulese integer)";
        return $this->execute_query_msg($sql,
            "U krijuar tabela Rezervo Bus",
            "Ka ndodhur gabim ne krijimin e tabeles Rezervo Bus!");
    }

    public function create_table_UdhetimetAeroplan(){
        $sql = "CREATE TABLE udhetimetAeroplan(Rid integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        return $this->execute_query_msg($sql,
            "U krijuar tabela UdhetimetAeroplan",
            "Ka ndodhur gabim ne krijimin e tabeles UdhetimetAeroplan!");
    }
    
    public function create_table_RezervoAeroplan(){
        $sql = "CREATE TABLE rezervoAeroplan(Id integer PRIMARY KEY AUTO_INCREMENT, Rid integer, Uid integer, Emri varchar(30), Mbiemri varchar(30), Ulese integer)";
        return $this->execute_query_msg($sql,
            "U krijuar tabela Rezervo Aeroplan",
            "Ka ndodhur gabim ne krijimin e tabeles Rezervo Aeroplan!");
    }
    
    public function create_table_Lokacione(){
        $sql = "CREATE TABLE lokacione(Lid integer PRIMARY KEY AUTO_INCREMENT, Vendi varchar(50), Pershkrimi varchar(300), Foto varchar(50))";
        return $this->execute_query_msg($sql,
            "U krijuar tabela Lokacionet",
            "Ka ndodhur gabim ne krijimin e tabeles Lokacionet!");
    }
    
    public function create_table_Forumi(){
        $sql = "CREATE TABLE forumi(tblID integer PRIMARY KEY AUTO_INCREMENT, ChatID integer, Komentuesi varchar(50), Komenti varchar(300))";
        return $this->execute_query_msg($sql,
            "U krijuar tabela Forumi",
            "Ka ndodhur gabim ne krijimin e tabeles Forumi!");
    }
}

class db_connector {
    private $connection;
    
    protected function connector_create_db() {
        $this->connection = mysqli_connect($config["db"]["host"], $config["db"]["username"], $config["db"]["password"]);
        if (!$this->connection) {
            die("Connection failed!");
        }
        
        $sql = "CREATE DATABASE ".$config["db"]["dbname"];
        if (mysqli_query($this->connection, $sql)) {
            $rez = true;
        } else {
            $rez = false;
        }
        
        $this->mbyll_lidhjen();
        return $rez;
    }
    
    protected function execute_query_msg($sql, $message_ok, $message_error)
    {
        if (execute_query($sql)) {
            return $message_ok;
        } else {
            return $message_error;
        }
    }
    
    public function execute_query($sql)
    {
        $this->konektohu();
        if (mysqli_query($this->connection, $sql)) {
            $rezultati = true;
        } else {
            $rezultati = false;
        }
        
        $this->mbyll_lidhjen();
        return $rezultati;
    }
    
    public function get_data($sql)
    {
        $this->konektohu();
        $array = array();
        $result = mysqli_query($this->connection, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($array, $row);
            }
        }
        
        $this->mbyll_lidhjen();
        return $array;
    }
    
    private function konektohu() {
		$config = $GLOBALS["config"];
        $this->connection = mysqli_connect($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
        if (!$this->connection) {
            die("Connection failed!");
        }
    }
    
    private function mbyll_lidhjen() {
        mysqli_close($this->connection);
    }
}
?>