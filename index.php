<?php
require_once 'DB.php';

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = json_decode(file_get_contents("php://input"), false, 512, JSON_THROW_ON_ERROR);
    } catch(JsonException $e) {
        error(ERR_DECODE);
    }
    if($data->method == 'getUser'){
        echo $db->getUser($data->phone);
    }
    if($data->method == 'addUser') {
        echo $db->addUser($data->phone, $data->name);
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo "ready";
}
