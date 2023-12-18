<?php
require '../Classes/Questions.php';
require '../Classes/Connection.php';

$questionCLass = new Questions();
$connectionClass = new Connection();

$questionCLass->updateQuestion($connectionClass->setConnection(), $_POST['formData'][3],$_POST['formData'][0],$_POST['formData'][1],$_POST['formData'][2]);

foreach ($_POST['data'] as $row) {
    $questionCLass->updateQuestionLists($connectionClass->setConnection(), $row[0], $row[1], $row[2]);
}
?>