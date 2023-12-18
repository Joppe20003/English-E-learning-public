<?php
session_start();

require '../Classes/Questions.php';
require '../Classes/Connection.php';

$connectionClass = new Connection();
$questionClass = new Questions();

$data = null;
$dataFrom = null;

if (isset($_POST["data"]) && isset($_POST['formData'])) {
    $data = $_POST["data"];
    $dataFrom = $_POST["formData"];

    $questionClass->insertList($dataFrom[2], $_SESSION["users_id"], $dataFrom[0], $dataFrom[1], $connectionClass->setConnection());

    foreach ($data as $record) {
        $questionClass->insertQuestionLists($questionClass->findListId($connectionClass->setConnection()), $record[0], $record[1], $connectionClass->setConnection());
    }
}
?>