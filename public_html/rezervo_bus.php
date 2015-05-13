<?php
require_once("../resources/config.php");
require (databaza);

session_start();

if(!isset($_SESSION['Username']) || !isset($_SESSION['Emri']) || !isset($_SESSION['Mbiemri']))
{
    header("Location: http://localhost/login.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Konfirmo'])){
    
    $emriRezervuar = $_POST['EmriRezervuar'];
    $mbiemriRezervuar = $_POST['MbiemriRezervuar'];
    $ulese = $_POST['UleseRezervuar'];
    $Rid = $_POST['Rid'];
    $Uid = $_POST['Uid'];
    
    $db = new repository();
    
    $rezervo = new RezervoUdhetim($db,$Rid,$Uid,$emriRezervuar,$mbiemriRezervuar,$ulese);
    
    $rezervo->rezervo();
}else{

    $username = $_SESSION['Username'];
    $emriUser = $_SESSION['Emri'];
    $mbiemriUser = $_SESSION['Mbiemri'];
    $Rid = $_POST['udhetimiId'];
    $Rid = substr($Rid, 3);

    $db = new repository();

    $sql = "Select * From user Where Username = '$username'";
    $rez = $db->get_data($sql);
    $Uid = $rez[0]['Uid'];  

    $sql = "Select * From udhetimetbus Where Rid = '$Rid'";
    $rez = $db->get_data($sql);
    $Prej = $rez[0]['Prej'];
    $Deri = $rez[0]['Deri'];
    $Cmimi = $rez[0]['Cmimi'];

    function RezervoForma(){
        global $Prej, $Deri, $emriUser, $mbiemriUser, $Cmimi, $Rid, $Uid;
        ?>
            <html>
                <head><script type="text/javascript" src="js/llogarit.js"></script></head>
                <body onload="pagesa();">
                    <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <table>
                            <input type="hidden" name="Rid" value="<?php echo $Rid; ?>">
                            <input type="hidden" name="Uid" value="<?php echo $Uid; ?>">
                            <tr>
                                <td>Emri: </td><td><input type="text" name="EmriRezervuar" value="<?php echo $emriUser; ?>"></td>
                            </tr>
                            <tr>
                                <td>Mbiemri: </td><td><input type="text" name="MbiemriRezervuar" value="<?php echo $mbiemriUser; ?>"></td>
                            </tr>
                            <tr>
                                <td>Prej: </td><td><input type="text" name="PrejRezervuar" value="<?php echo $Prej; ?> " readonly></td>
                            </tr>
                            <tr>
                                <td>Deri: </td><td><input type="text" name="DeriRezervuar" value="<?php echo $Deri; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Ulese: </td><td><input id="ulese" type="number" min="1" name="UleseRezervuar" value="1"></td>
                            </tr>
                            <tr>
                                <td>Cmimi: </td><td><input id="cmimi" type="text" name="CmimiRezervuar" value="<?php echo $Cmimi; ?>" readonly> &#8364;</td>
                            </tr>
                            <tr>
                                <td>Gjithesejt cmimi:</td><td><p id="gjith"></p></td>
                            </tr>
                            <tr>
                                <td></td><td><input type="submit" name="Konfirmo" value="Konfirmo Rezervimin"></td>
                            </tr>
                        </table>
                    </form>
                </body>
            </html>
        <?php
    }

    RezervoForma();
}
?>

<?php

class RezervoUdhetim{
    
    private $rid;
    private $uid;
    private $emri;
    private $mbiemri;
    private $ulese;
    private $db;
    
    public function __construct(repository $db,$rid,$uid,$emri,$mbiemri,$ulese) {
        $this->db = $db;
        $this->rid = $rid;
        $this->uid = $uid;
        $this->emri = $emri;
        $this->mbiemri = $mbiemri;
        $this->ulese = $ulese;
    }   
    
    private function kontrollo(){
        
        $sql = "Select * from udhetimetbus where Rid=$this->rid";
        
        $row = $this->db->get_data($sql);
               
        if ($row[0]['Ulese'] < $this->ulese) {
            return false;
        } else {
            return true;
        }       
    }
    
    private function update(){
       
        $sql = "Update udhetimetbus set Ulese = Ulese - $this->ulese Where Rid = $this->rid";
        
        if ($this->db->execute_query($sql)) {
            return true;
        } else {
            return false;
        }   
    }
    
    private function inserto(){
        
        $sql = "Insert into rezervobus(Rid,Uid,Emri,Mbiemri,Ulese) values ($this->rid,$this->uid,'$this->emri','$this->mbiemri',$this->ulese)";
        
        if ($this->db->execute_query($sql)) {
            return true;
        } else {
            return false;
        }  
    }
    
    public function rezervo(){
        
        if($this->kontrollo() && $this->update() && $this->inserto()){
            echo "U rezervua me sukses";
        } else {
            echo "Nuk u rezervua!";
        }
    }
}

?>