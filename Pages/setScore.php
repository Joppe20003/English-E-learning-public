<?php
session_start();

require '../Classes/Score.php';
require '../Classes/Connection.php';

$connectionClass = new Connection();
$scoreClass = new Score();

if (isset($_POST['submit'])) {
    $scoreClass->insertScoreUser($connectionClass->setConnection(), $_SESSION['users_id'],$_POST['listId'],$_POST['goodBox'],$_POST['wrongBox']);
}

header( "Refresh:0.1; url=lists.php", true, 303);
?>