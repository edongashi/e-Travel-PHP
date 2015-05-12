<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "edb";

    
    $connect = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$connect) {
        die("Connection failed!");
    }   

    $sql = "Select * From lokacione";
    
    $result = mysqli_query($connect, $sql);
            
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){
            echo "<p><img src='img/content/".$row['Foto']."' height='150px' width='150px'><b> ".$row['Vendi']."</b><br />".$row['Pershkrimi']."</p>";
        }
    } else {
        echo "0 results";
    }
    
    mysqli_close($connect);

?>

