<?php
echo '<pre>';
    var_dump($_POST);
echo '</pre>';
$todo_name = $_post["todo_name"] ?? '';
$todo_name = trim($todo_name);
if($todo_name){
    echo "save todo";
    
}