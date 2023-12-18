<?php
require '../Classes/Questions.php';
require '../Classes/Lists.php';
require '../Classes/Connection.php';

$conntionClass = new Connection();
$questionsClass = new Questions();
$listsClass = new Lists();

$array = [];

$dataArrayQuestions = $questionsClass->getAllQuestionsByListId($_POST['id'],$conntionClass->setConnection());

if ($dataArrayQuestions->num_rows > 0) {
    while ($row = $dataArrayQuestions->fetch_assoc()) {
        foreach ($dataArrayQuestions as $row) {
            $array[] = $row;
        }
    }
}

echo json_encode($array);
?>