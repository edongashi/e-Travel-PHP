<?php
if (isset($_POST["passwordi"])) {
    $pass = $_POST["passwordi"];
    if ($pass == "admin123") {
        session_start();
        $_SESSION['Emri'] = "admin";
        $_SESSION['Mbiemri'] = "admin";
        $_SESSION['Username'] = "admin";
        $_SESSION['Prioriteti'] = "Admin";
        header("Location: /menaxhimi/index.php");
    }
}
?>

<html>
<head>
    <title>Login anonim</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        Shkruani passwordin:
        <input type="password" name="passwordi" />
    </form>
</body>
</html>
