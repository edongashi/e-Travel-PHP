<?php
require_once("../../resources/config.php");
$header_titulli = "Regjistro foto";
$css_includes = Array("../css/form.css", "../css/dashboard.css");
require(dashboard_header);
require(databaza);
$db = new repository;
$target_dir = "../img/content/Galeria/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Fajlli eshte foto - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Fajlli nuk eshte foto.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo " Foto qe keni zgjedhur egziston!";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo " Madhesia e fotos kalon limitin!";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo " Formati i fajllit nuk lejohet!";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo " Upload i kesaj foto nuk u lejua!";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Foto ". basename( $_FILES["fileToUpload"]["name"]). " u upload ne server!.";
		if ($db->execute("Insert Into galeria(FotoPath, FotoID) values (%s, %d)", $target_file, $_POST['numri_rendor'])) {
			$error_msg = htmlentities(" Regjistrimi u krye me sukses");
			echo $error_msg;
		} else {
			$error_msg = htmlentities(" Regjistrimi nuk u krye me sukses");
		}
    } else {
        echo " Ka ndodhur nje problem gjat upload-it te file!";
    }
}
require(dashboard_footer);
?>