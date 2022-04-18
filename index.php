<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo app php</title>
</head>
<body>
    <form action="addTask.php" method="post">
        <input type="text" name="newTask">
        <button type="submit">Add</button>
    </form>
    <ul class="list">
        <li class="task-box">
            <p class="task-text">place holder</p>
            <button class="done">mark as done</button>
            <button class="done">edit</button>
            <button class="delete">delete</button>
        </li>
    </ul>
</body>
</html>