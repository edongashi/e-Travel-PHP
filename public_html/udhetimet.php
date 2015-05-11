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
    
    $sql = "Select * From udhetimet Where Data >= Now()";
    
    $result = mysqli_query($connect, $sql);
            
    if(mysqli_num_rows($result) > 0){
    	echo "<form method='Post' action='regjistro.php'><input type='hidden' name='udhetimiId'>";
        echo "<table style='width:30%;'> <th align='left'>Prej</th><th align='left'>Deri</th><th align='left'>Nr Ulseve</th><th align='left'>Data</th>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['Prej']."</td><td>".$row['Deri']."</td><td>".$row['Ulese']."</td><td>".$row['Data']."</td><td>"
                    . "<input type='submit' value='Rezervo' id='".$row['Id']."'></td></tr>";
        }
        echo "</form></table>";
    } else {
        echo "0 results";
    }
    
    mysqli_close($connect);
?>

