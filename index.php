<?php include './process.php'; ?>


<!DOCTYPE html>
<html lang="en">

<?php

// include "connection.php";

// // Adds new task inside db and trims it
// if (isset($_POST['submit'])) {
//   $newTask = $_POST['newTask'];
//   $todo_name = $_POST['newTask'] ?? '';
//   $todo_name = trim($todo_name);
//   if($todo_name > 0) {
//       $query = "INSERT INTO tasks(task)";
//       $query .= "VALUES ('$newTask')";
//       $result = mysqli_query($conn, $query);
//       if (!$result) {
//         die('Query insertion failed');
//       }
//   }
// }

// // Deletes certain task
// if (isset($_GET['del_task'])) {
//   $id = $_GET['del_task'];
//   mysqli_query($conn, "DELETE FROM tasks WHERE id=".$id);
// }

// if(isset($_GET["edit"])) {
//   $id = $_GET["id"];
//   $taskedit = $_GET["taskedit"];
//   $query= "UPDATE `tasks` SET `task` = '$taskedit' WHERE `tasks`.`id`=".$id; 
//   $result = mysqli_query($conn, $query);
//   if (!$result) {
//     die('Query update failed');
//   }
// }

  // ---- READ ----
  $sql = "SELECT * FROM tasks";
  $result = mysqli_query($conn, $sql);
  $todos = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FontAwesome -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />


    <link rel="stylesheet" href="./style.css">

    <title>todo app php</title>
  </head>

  <body>
    <div class="banner">
      <img class="logo" src="./teamSonic.png" alt="#">
      <h1 class="team">Team</h1>
      <h1 class="sonic">SONIC</h1>
    </div>

    <h2 class="h2addtask">Add a new task:</h2>

    <!-- <form action="index.php" method="post">
    <input type="text" name="newTask"/>
    <button type="submit" name="submit">Add</button>
    </form> -->

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="add-todo">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input class="input" type="text" name="add" value="<?php echo $task; ?>" placeholder="Add a new to-do"/>

      <?php 
      if ($update == true):
      ?>
        <button type="submit" name="update" class="todo-btn">Update</button>
      <?php else: ?>
        <button type="submit" name="submit" class="todo-btn">Save</button>
      <?php endif; ?>
    </form>


    <ul class="list">
      <h1 class="h1todo">Todo list:</h1>

      <!-- <?php
          // $query = "SELECT * FROM tasks";
          // $result = mysqli_query($conn, $query);
          // while($row = $result->fetch_assoc()) { ?>
            <li class="task-box">
              <p class="task-text"><?php echo $row['task']?></p>
              <button class="delete" name="delete"> 
                <a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
              </button>
            </li>
            <?php
          // }
      ?>

      <form action="index.php" method="get">
        <input type="text" name="taskedit"/>
        <select name="id"> 
          <?php
            // $query = "SELECT * FROM tasks"; 
            // $result = mysqli_query($conn, $query);
            // while($row = $result->fetch_assoc()) {
            //   echo '<option name="id" value='.$row['id'].'>'.$row['task'].'
            //   </option>';
            // }?>
        </select>
        <input type="submit" name="edit" value="edit"/>
      </form> -->

      <!-- Insert data into template -->
      <?php foreach($todos as $todo): ?>
        <li class="task-box">
          <span class="task-text"> <?php echo $todo['task'] ?> </span>
          <div class="icon-group">
            <a href="./index.php?edit=<?php echo $todo['id']; ?>">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href="./process.php?delete=<?php echo $todo['id']; ?>">
              <i class="fa-regular fa-trash-can delete"></i>
            </a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
</body>
</html>