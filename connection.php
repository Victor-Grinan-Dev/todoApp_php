 <?php 
$user = "root";
$password = "lionPass";
$host = "db";
$db_name = "todoapp";

$conn = @mysqli_connect($host, $user, $password, $db_name) or die("couldn't connect" . mysqli_connect_error());
 ?>