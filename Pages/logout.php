<?php

require '../Classes/Acces.php';

$accesClasses = new Acces();

$accesClasses->checkAccesEnglish();

session_start();
session_destroy();
header( "Refresh:0.1; url=index.php", true, 303);
?>