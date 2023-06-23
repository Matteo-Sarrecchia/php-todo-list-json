<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

$index = $_POST['index'];

$todoListStr = file_get_contents("data.json");
$todoList = json_decode($todoListStr);

array_splice($todoList, $index, 1);

$todoListStr = json_encode($todoList);

file_put_contents("data.json", $todoListStr);
echo json_encode($todoList);