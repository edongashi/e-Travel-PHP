<br />
<style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
    <script
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
    </script>
    <script>
        var myCenter = new google.maps.LatLng(41.3197417, 19.4498564);

        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: 14,
                disableDefaultUI: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };

            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(41.3197417, 19.4498564),
            });

            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="lokacion-mbajtesi" style="margin-bottom:10px;">
    <div id="googleMap" style="width:100%;height:200px;"></div>
    </div>  
<div class="lokacion-mbajtesi">
    <h1 style="margin: 20px 40px; position:absolute">Komento: </h1>
    <form class="form lokacion-permbajtja" style="margin-left: 280px; margin-bottom: 50px;" name="KomentForma" method="post">
        <textarea name="komenti" cols="120" rows="5" maxlength="300"></textarea>
        <button style='float:right; margin-top:10px;' class='button' type="submit" name="<?php $_GET['id'] ?>">Dergo</button>
    </form>
</div>
<br />

<?php
require_once("../resources/config.php");
require_once(databaza);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$db = new repository;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['komenti']))
{
    if (!isset($_SESSION['Username']) || !isset($_SESSION['Emri']) || !isset($_SESSION['Mbiemri']))	{
        header("Location: http://localhost/login.php");
    } else {
        $komenti = $_POST['komenti'];
        $komentuesi = $_SESSION['Username'];
        $db->execute("Insert Into forumi(ChatID, Komentuesi, Komenti) values (" . $_GET["id"] .",'$komentuesi','$komenti')");
		header('Location: /lokacionet.php?id='. $_GET['id']);
        exit;
    }
}
?>