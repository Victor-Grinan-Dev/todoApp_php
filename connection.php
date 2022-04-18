 <?php 
$user = "root";
$password = "lionpass";
$host = "localhost";
$name = "todolist";

$conn = @mysqli_connect($host, $user, $password, $db_name) or die("couldn't connect" . mysqli_connect_error());
 ?>