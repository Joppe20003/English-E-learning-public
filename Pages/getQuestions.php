<?php
require '../Classes/Questions.php';
require '../Classes/Lists.php';
require '../Classes/Connection.php';

$connectionClass = new Connection();
$questionsClass = new Questions();
$listsClass = new Lists();

$array = [];

$dataArrayQuestions = $questionsClass->getAllQuestionsByListId($_GET['listId'],$connectionClass->setConnection());

if ($dataArrayQuestions->num_rows > 0) {
    while ($row = $dataArrayQuestions->fetch_assoc()) {
        foreach ($dataArrayQuestions as $row) {
            $array[] = $row;
        }
    }
}

echo json_encode($array);
?>