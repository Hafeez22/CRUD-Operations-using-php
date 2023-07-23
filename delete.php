<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "embark";
            
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "DELETE FROM details WHERE  id = $id";
            $conn->query($sql);
            $conn->close();
            echo "<script>alert('Record Deleted Successfully');window.location = './insert.php'</script>";
            die();
}


?>