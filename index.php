<?php
$localhost = "localhost";
$database = "be_exam_t3";
$username = "root";
$password = "";

$connection = new mysqli($localhost, $username, $password, $database);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
$x = $_GET['x'];
$x = stripslashes($x);
$x = mysqli_real_escape_string($connection, $x);
$x = (int) filter_var($x, FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT id,short_description,article FROM news where id= $x";
$result = $connection->query($query);

if($result && mysqli_num_rows($result)>0) {
    while($row = mysqli_fetch_assoc($result)) {  
   
      echo $row['short_description'] ;
      echo "  ";
      echo $row['article'];
      echo "<br>";
     
      
        } 

    }elseif ($result != $_GET['x']) {
   http_response_code(404);
include('my_404.php');
die();


}


?>



