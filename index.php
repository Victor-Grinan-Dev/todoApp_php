<!DOCTYPE html>
<html lang="en">
<?php

include "connection.php";

// Adds new task inside db and trims it
if (isset($_POST['submit'])) {
  
  $newTask = $_POST['newTask'];
  $todo_name = $_POST['newTask'] ?? '';
  $todo_name = trim($todo_name);
  if($todo_name > 0) {
      $query = "INSERT INTO tasks(task)";
      $query .= "VALUES ('$newTask')";
      $result = mysqli_query($conn, $query);
      if (!$result) {
        die('Query insertion failed');
      }
  }
  
}

// Deletes certain task
if (isset($_GET['del_task'])) {
  $id = $_GET['del_task'];
 

  mysqli_query($conn, "DELETE FROM tasks WHERE id=".$id);
  
}


?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>todo app php</title>
</head>
<body>
    <div class="banner">
        <img class="logo" src="./teamSonic.png" alt="#">
        <h1 class="team">Team</h1>
        <h1 class="sonic">SONIC</h1>
    </div>

   
    <!-- <form action="addTask.php" method="post"> -->
        <form action="index.php" method="post">
        <input type="text" name="newTask"/>
        <button type="submit" name="submit">Add</button>
        </form>
        <ul class="list">
            <h1>Todo list:</h1>
            <!-- <li class="task-box"> -->
                <?php
            $query = "SELECT * FROM tasks"; 
            $result = mysqli_query($conn, $query);
          
            
            while($row = $result->fetch_assoc()) { ?>  
              <li class="task-box"><p class="task-text"><?php echo $row['task']?></p>  
              <button class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
            </button>
              </li>
             <?php 
            }

        
            
            ?>
         
         <?php 

?>
          
    </ul>
</body>
</html>