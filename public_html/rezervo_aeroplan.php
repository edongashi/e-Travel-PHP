<?php
require_once("../resources/config.php");
require (databaza);

$css_includes = Array("css/form.css", "css/site.css");
$script_includes = jquery;
require(templates_header);

if (!isset($_SESSION['Username']) || !isset($_SESSION['Emri']) || !isset($_SESSION['Mbiemri'])) {
    header("Location: http://localhost/login.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Konfirmo'])) {
    $emriRezervuar = $_POST['EmriRezervuar'];
    $mbiemriRezervuar = $_POST['MbiemriRezervuar'];
    $ulese = $_POST['UleseRezervuar'];
    $Rid = $_POST['Rid'];
    $Uid = $_POST['Uid'];

    $db = new repository;
    $rezervo = new RezervoUdhetim($db, $Rid, $Uid, $emriRezervuar, $mbiemriRezervuar, $ulese);
    $rezervo->rezervo();
} else {
    $username = $_SESSION['Username'];
    $emriUser = $_SESSION['Emri'];
    $mbiemriUser = $_SESSION['Mbiemri'];
    $Rid = $_POST['udhetimiId'];
    $Rid = substr($Rid, 3);

    $db = new repository;

    $sql = "Select * From user Where Username = '$username'";
    $rez = $db->get_data($sql);
    $Uid = $rez[0]['Uid'];

    $sql = "Select * From udhetimetaeroplan Where Rid = '$Rid'";
    $rez = $db->get_data($sql);
    $Prej = $rez[0]['Prej'];
    $Deri = $rez[0]['Deri'];
    $Cmimi = $rez[0]['Cmimi'];
    
?>
    <form class="form" method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <input type="hidden" name="Rid" value="<?php echo $Rid; ?>">
            <input type="hidden" name="Uid" value="<?php echo $Uid; ?>">
            <tr>
                <td>Emri: </td>
                <td>
                    <input type="text" name="EmriRezervuar" value="<?php echo $emriUser; ?>"></td>
            </tr>
            <tr>
                <td>Mbiemri: </td>
                <td>
                    <input type="text" name="MbiemriRezervuar" value="<?php echo $mbiemriUser; ?>"></td>
            </tr>
            <tr>
                <td>Prej: </td>
                <td>
                    <input type="text" name="PrejRezervuar" value="<?php echo $Prej; ?> " readonly></td>
            </tr>
            <tr>
                <td>Deri: </td>
                <td>
                    <input type="text" name="DeriRezervuar" value="<?php echo $Deri; ?>" readonly></td>
            </tr>
            <tr>
                <td>Ulese: </td>
                <td>
                    <input id="ulese" type="number" min="1" name="UleseRezervuar" value="1"></td>
            </tr>
            <tr>
                <td>Cmimi: </td>
                <td>
                    <?php echo $Cmimi; ?> &#8364;</td>
            </tr>
            <tr>
                <td>Gjithesejt cmimi:</td>
                <td id="totali">
                    <?php echo $Cmimi; ?> &#8364;
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="button" type="submit" name="Konfirmo" value="Konfirmo Rezervimin"></td>
            </tr>
        </table>
    </form>
    <script>
    $("#ulese").change(function () {
    $("#totali").html($(this).val() * <?php echo $Cmimi; ?> + " &#8364;");
    })
    </script>
<?php
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

    public function __construct(repository $db, $rid, $uid, $emri, $mbiemri, $ulese) {
        $this->db = $db;
        $this->rid = $rid;
        $this->uid = $uid;
        $this->emri = $emri;
        $this->mbiemri = $mbiemri;
        $this->ulese = $ulese;
    }

    private function kontrollo() {
      
        $row = $this->db->get_data("Select * from udhetimetaeroplan where Rid=%d",$this->rid);

        if ($row[0]['Ulese'] < $this->ulese) {
            return false;
        } else {
            return true;
        }
    }

    private function update() {

        if ($this->db->execute("Update udhetimetaeroplan set Ulese = Ulese - %d Where Rid = %d", $this->ulese, $this->rid)) {
            return true;
        } else {
            return false;
        }
    }

    private function inserto() {
           
        if ($this->db->execute("Insert into rezervoaeroplan(Rid,Uid,Emri,Mbiemri,Ulese,Data_Rezervimit) values (%d,%d,%s,%s,%d,Now())", $this->rid, $this->uid, $this->emri, $this->mbiemri, $this->ulese)) {
            return true;
        } else {
            return false;
        }
    }

    public function rezervo() {

        if ($this->kontrollo() && $this->update() && $this->inserto()) {
            echo "U rezervua me sukses";
        } else {
            echo "Nuk u rezervua!";
        }
    }
}

?>

<?php require(templates_footer); ?>