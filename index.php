<?php

header('Content-Type: application/json');

$saluto = [
  [
    "saluto" => "ciao",
    "nome" => "matteo",
    "cognome" => "rossi",
  ],
  [
    "saluto" => "hello",
    "nome" => "viola",
    "cognome" => "bianchi",
  ]
];

echo json_encode($saluto);