<!DOCTYPE html>
<html lang="en">
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
   
    <form action="addTask.php" method="post">
        <input type="text" name="newTask">
        <button type="submit">Add</button>
    </form>
    <ul class="list">
        <h1>Todo list:</h1>
        <li class="task-box">
            <p class="task-text">Sample task</p>
            <button class="done">done</button>
            <button class="done">edit</button>
            <button class="delete">delete</button>
        </li>
    </ul>
</body>
</html>