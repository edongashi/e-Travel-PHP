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
        return $this->execute_msg($sql,
            "Database eshte fshire me sukses",
            "Ka ndodhur gabim ne fshirjen e databazes");
    }

    public function create_table_User() {
        $sql = "CREATE TABLE user(Uid integer PRIMARY KEY AUTO_INCREMENT, Username varchar(25), Password varchar(160), Emri varchar(30), Mbiemri varchar(30), Prioriteti varchar(10))";
        return $this->execute_msg($sql,
            "U krijuar tabela User",
            "Ka ndodhur gabim ne krijimin e tabeles User!");
    }

    public function create_table_UdhetimetBus() {
        $sql = "CREATE TABLE udhetimetBus(Rid integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        return $this->execute_msg($sql,
            "U krijuar tabela UdhetimetBus",
            "Ka ndodhur gabim ne krijimin e tabeles UdhetimetBus!");
    }

    public function create_table_RezervoBus() {
        $sql = "CREATE TABLE rezervoBus(Id integer PRIMARY KEY AUTO_INCREMENT, Rid integer, Uid integer, Emri varchar(30), Mbiemri varchar(30), Ulese integer)";
        return $this->execute_msg($sql,
            "U krijuar tabela Rezervo Bus",
            "Ka ndodhur gabim ne krijimin e tabeles Rezervo Bus!");
    }

    public function create_table_UdhetimetAeroplan() {
        $sql = "CREATE TABLE udhetimetAeroplan(Rid integer PRIMARY KEY AUTO_INCREMENT, Prej varchar(50), Deri varchar(50), Ulese integer, Data date, Cmimi integer)";
        return $this->execute_msg($sql,
            "U krijuar tabela UdhetimetAeroplan",
            "Ka ndodhur gabim ne krijimin e tabeles UdhetimetAeroplan!");
    }

    public function create_table_RezervoAeroplan() {
        $sql = "CREATE TABLE rezervoAeroplan(Id integer PRIMARY KEY AUTO_INCREMENT, Rid integer, Uid integer, Emri varchar(30), Mbiemri varchar(30), Ulese integer)";
        return $this->execute_msg($sql,
            "U krijuar tabela Rezervo Aeroplan",
            "Ka ndodhur gabim ne krijimin e tabeles Rezervo Aeroplan!");
    }

    public function create_table_Lokacione() {
        $sql = "CREATE TABLE lokacione(Lid integer PRIMARY KEY AUTO_INCREMENT, Vendi varchar(50), Pershkrimi varchar(300), Foto varchar(50))";
        return $this->execute_msg($sql,
            "U krijuar tabela Lokacionet",
            "Ka ndodhur gabim ne krijimin e tabeles Lokacionet!");
    }

    public function create_table_Forumi() {
        $sql = "CREATE TABLE forumi(tblID integer PRIMARY KEY AUTO_INCREMENT, ChatID integer, Komentuesi varchar(50), Komenti varchar(300))";
        return $this->execute_msg($sql,
            "U krijuar tabela Forumi",
            "Ka ndodhur gabim ne krijimin e tabeles Forumi!");
    }
}

class db_connector {
    private $connection;

    protected function connector_create_db() {
        global $config;
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

    protected function execute_msg($sql, $message_ok, $message_error)
    {
        if (execute($sql)) {
            return $message_ok;
        } else {
            return $message_error;
        }
    }

    public function execute($sql)
    {
        $this->konektohu();
        
        // Nese kemi safe_query ose me shume parametra provo merr safe string.
        try {
            if ($sql instanceof safe_query) {
                $sql = $sql->merr_safe_string($this->connection);
            } else if (func_num_args() > 1) {
                $sql = (new safe_query(func_get_args()))->merr_safe_string($this->connection);
            }
        }
        catch (Exception $e) {
            return false;
        }
        
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
        
        try {
            if ($sql instanceof safe_query) {
                $sql = $sql->merr_safe_string($this->connection);
            } else if (func_num_args() > 1) {
                $sql = (new safe_query(func_get_args()))->merr_safe_string($this->connection);
            }
        }
        catch (Exception $e) {
            return array();
        }
        
        $array = array();
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($array, $row);
            }
        }

        $this->mbyll_lidhjen();
        return $array;
    }

    private function konektohu() {
		global $config;
        $this->connection = mysqli_connect($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
        if (!$this->connection) {
            die("Connection failed!");
        }
    }

    private function mbyll_lidhjen() {
        mysqli_close($this->connection);
    }
}

class safe_query {
    private $sql;
    private $parametrat;
    
    public function __construct($sql) {
        if (is_array($sql)) {
            if (empty($sql)) throw new Exception("Krijim jo valid i safe query.");
            $this->sql = array_shift($sql);
            $this-> parametrat = $sql;
            return;
        }
        
        $this->sql = $sql;
        $argumentet = func_get_args();
        array_shift($argumentet);
        $this->parametrat = $argumentet;
    }
    
    public function merr_safe_string($connection) {
        $pattern = '/(?<!\\\)%(s|d)/';
        $count = count($this->parametrat);
        $i = 0;
        $rez = preg_replace_callback(
            $pattern,
            function ($matches) use ($connection, $count, &$i) {
                if ($i >= $count) {
                    throw new Exception("Mosperputhje e parametrave tek $this->sql.");
                }
                
                $parametri = $this->parametrat[$i++];
                switch ($matches[1])
                {
                    case 's':
                        return "'" . mysqli_real_escape_string($connection, $parametri) . "'";
                    case 'd':
                        $pattern_numer = '/^\s*[+\-]?(?:\d+(?:\.\d+)?|\.\d+)\s*$/';
                        if (preg_match($pattern_numer, $parametri)) {
                            return $parametri;
                        } else throw new Exception("Vlere jo numerike $parametri.");
                    default:
                        return $matches[0];
                }
            },
            $this->sql);

        return str_replace("\%", "%", $rez);
    }
}
?>