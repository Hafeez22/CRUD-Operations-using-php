<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "embark";

$con = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$address = "";
$email = "";
$errormsg = "";
$successmsg = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("Location: /embark/index.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM  details WHERE id = $id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location : /insert.php");
        exit;
    }

    $name = $row["name"];
    $address = $row["address"];
    $email = $row["mail"];
}

else{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["addr"];
    $mail = $_POST["email"];

    do {
        $sql = "UPDATE details " .
            "SET  name = '$name', address = '$address', mail = '$mail' " .
            "WHERE id = $id";
    
       
        $result = $con->query($sql);

        if(!$result){
            $errormsg = "invalid";
            break;
        }
        
        $successmsg = "sucess";
       
        echo "<script>alert('Record Update Successfully');window.location = './insert.php'</script>";
        die();
    
    } while (true);
    $conn->close();
}



?>
<html>
    <head>
<title>embark</title>
<body>
    <h1>Embark</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>" >
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br /></br>
        Address:<input type="text" name="addr" value="<?php echo $address; ?>"><br /></br>
        E-mail: <input type="email" name="email" value="<?php echo $email; ?>"><br /><br />
        <input type="submit" value="update" />
    </form>
</body>
</html>