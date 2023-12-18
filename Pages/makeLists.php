<?php
session_start();

require '../Classes/Acces.php';
require '../Classes/Lists.php';
require '../Classes/Mode.php';
require '../Classes/Connection.php';

$modeClass = new Mode();
$connectionClass = new Connection();
$accesClasses = new Acces();
$listsClass = new Lists();

$accesClasses->checkAccesEnglish();

include '../Particals/header.php';
?>
<body class="wv-100 vh-100 bg-light d-flex flex-column">
<div class="container mb-auto">
    <div class="row">
        <div class="alert alert-danger mt-3" role="alert" id="alertDangerList" style="display: none;">
            <div class="d-flex justify-content-center">
                <div class="alert-link">LET OP! </div>
                <div id="alertDangerListText" style="margin-left: 7.5px"></div>
            </div>
        </div>
        <div class="col-lg-12 h-100 mt-3">
            <div class="m-lg-3 p-lg-3 bg-white mt-lg-3 pt-3 pb-3 mt-3 p-3">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success w-50 mb-3" href="../Pages/lists.php">Terug</a>
                </div>
                <div class="mt-5 mb-5">
                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Naam van de lijst:</label>
                        <input type="text" class="form-control" id="nameList" aria-describedby="nameList" name="nameList"" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Beschrijving van de lijst:</label>
                        <input type="text" class="form-control" id="descriptionList" aria-describedby="descriptionList" name="descriptionList"" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Mode van de lijst:</label>
                        <select class="form-select" aria-label="Default select example" id="modeId" required>
                            <option value="1" selected>Kies een mode</option>
                            <?php
                            $result = $modeClass->selectAllMode($connectionClass->setConnection());

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    foreach ($result as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $row['mode_name'] . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row" id="makeQuestionsField"></div>
                <p class="link-primary" id="makeQuestions">Klik hier voor 1 vraag en antwoordt vak erbij</p>
                <button type="submit" class="btn btn-primary" name="nextStep" onclick="registerQuestion()">Maak lijst</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    setDocumentBegin();
</script>
<footer>
    <div class="bg-white pt-1 pb-1 mt-3 d-flex justify-content-center">
        Copyright: © Alle rechten voor behouden 2021 - <script>document.write(new Date().getFullYear())</script>
    </div>
</footer>
</html>
