<?php
  // Define constants
  define('DB_HOST', 'db');
  define('DB_USER', 'root');
  define('DB_PASS', 'lionPass');
  define('DB_NAME', 'todoapp');
  
  // Create connection instance
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if ($conn->connect_error) {
    die('Connection failed ' . $conn->connect_error);
  }
  // echo 'Connected to database `todoapp`';

  $id = 0;
  $update = false;
  $task = '';

  // ---- CREATE ----
  $add = '';
  $addErr = '';
  // Form submit
  if (isset($_POST['submit'])) {
    // Validate input
    if (empty($_POST['add'])) {
      $addErr = 'cannot be empty';
    } else {
      $add = filter_input(INPUT_POST, 'add', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    // // Quick check
    // echo $addErr;
    // echo $add;
    // echo 'something';

    // Insert into database
    $sql = "INSERT INTO tasks (task) VALUES ('$add')";

    // Check query success
    if (mysqli_query($conn, $sql)) {
      // Success
      header('Location: index.php');
      // echo "success";
    } else {
      // Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }

  // ---- DELETE ----
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tasks WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
      // Success
      header('Location: index.php');
    } else {
      // Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
  
  
  // ---- UPDATE (1) ----
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    // $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = $conn->query("SELECT * FROM tasks WHERE id=$id");

    // Check if record exists
    if ($result->num_rows) {
      $todo = $result->fetch_array();
      $task = $todo['task'];
    }
  }

  // ---- UPDATE (2) ----
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['add'];

    $sql = "UPDATE tasks SET task='$task' WHERE id=$id";

    // Check query success
    if (mysqli_query($conn, $sql)) {
      // Success
      header('Location: index.php');
      // echo "success";
    } else {
      // Error
      echo 'Error: ' . mysqli_error($conn);
    }
  }
?>
