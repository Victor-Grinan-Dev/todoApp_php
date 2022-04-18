<?php

$selectQuerry = "SELECT * FROM tasks";

$response = @mysqli_query($conn, $selectQuerry);
if ($response){
   echo "a task here";
}
?>