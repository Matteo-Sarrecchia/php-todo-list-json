<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
// header('Content-Type: application/json');

$newTask = $_POST["testoTask"];

$todoListStr = file_get_contents("data.json");
$todoList = json_decode($todoListStr);

if (!$todoList){
    $todoList = [];
};

$todoList[] = $newTask;

$todoListStr = json_encode($todoList);

file_put_contents("data.json", $todoListStr);
echo $todoListStr;