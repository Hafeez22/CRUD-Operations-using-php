<html>
  <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "embark";
    
   
    $conn = mysqli_connect($servername, $username, $password, $dbname);
   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $name = $_POST['name'];
    $addr = $_POST['addr'];
    $mail=  $_POST['email'];


    $sql = "INSERT INTO details (id, name, address, mail)
    VALUES ('', '$name', '$addr','$mail')";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "<script>alert('Record Added Successfully'); window.location = './insert.php';</script>";
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
     }
  
     
    ?>
    <h1>Embark</h1>
    <div>
    <form method="post">
      Name: <input type="text" required name="name" /><br /></br>
      Address:<input type="text" required name = "addr" /><br/></br>
      E-mail: <input type="email" required name="email" /><br /><br/>
      <input type="submit" />
    </form>
    </div>
    <table>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>email</th>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "embark";
            
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM details";
            $result = $conn->query($sql); 
            if(!$result){
                die("Invalid". $conn->error);
            }

            
            while($row = $result->fetch_assoc()){
                echo "<tr>

                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[address]</td>
                <td>$row[mail]</td>
                <td>
                <a href='/embark/edit.php?id=$row[id]'>Edit</a>
                <a href='/embark/delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr>";    
            }
            ?>
        
    </tbody>
    </table>
  </body>
</html>
