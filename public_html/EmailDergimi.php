<?php
 
if(isset($_POST['email'])) {
	
	
	function ShfaqError($error) {
 
        echo $error."<br /><br />";
        die();
 
    }

// Mushja e te dhenave
 
    if(($_POST['emri'] == "") ||
 
        ($_POST['mbiemri'] == "") ||
 
        ($_POST['email'] == "") ||
 
        ($_POST['komenti'] == "")) {
 
        ShfaqError('Nuk keni mbushur te dhenat!');       
 
    }
 
     
 
    $emri = $_POST['emri']; 
 
    $mbiemri = $_POST['mbiemri'];
 
    $emailnga = $_POST['email'];
 
    $komenti = $_POST['komenti'];
 
     
 
    $errori = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$emailnga)) {
 
    $errori .= 'Email adresa jo valide!.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$emri)) {
 
    $errori .= 'Emri jo valid!<br />';
 
  }
 
  if(!preg_match($string_exp,$mbiemri)) {
 
    $errori .= 'Mbiemri jo valid!<br />';
 
  }
 
  if(strlen($komenti) < 2) {
 
    $errori .= 'Komenti jo valid!<br />';
 
  }
 
  if(strlen($errori) > 0) {
 
    ShfaqError($errori);
 
  }

     
 
    $email_message = "First Name: ".$emri."\n";
 
    $email_message .= "Last Name: ".$mbiemri."\n";
 
    $email_message .= "Email: ".$emailnga."\n";
 
    $email_message .= "Comments: ".$komenti."\n";
 

$email_to = "bleendd.1@gmail.com";
 
$email_subject = "Email subjekti";
 
 // Krijimi i headerit temail
 
$headers = array("From: $emailnga",
    "Reply-To: bleendd.1@gmail.com",
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);
 
mail($email_to, $email_subject, $email_message, $headers);

 
 echo "<script>
 alert('Emaili u dergua!');
 history.go(-1);
 </script>";
 
}
?>
 
