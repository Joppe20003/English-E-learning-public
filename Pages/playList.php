<?php
session_start();

require '../Classes/Acces.php';
require '../Classes/Lists.php';
require '../Classes/Score.php';

$accesClasses = new Acces();
$listsClass = new Lists();
$scoreClass = new Score();

$accesClasses->checkAccesEnglish();
$accesClasses->checkIsOwnList($_POST['listUserId'], $_POST['mode']);

include '../Particals/header.php';
?>
    <body class="wv-100 hv-100 bg-light d-flex flex-column">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="p-5 bg-white rounded shadow-sm">
                <div id="displayOne" style="display: block;">
                    <div class="row">
                        <div class="mb-3 col-lg-12">
                            <div id="questionBlockPlay"></div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="nextStep" onclick="checkAnswer($('#answer').val())" value="Controleren">
                </div>
                <div id="displayTwo" style="display: none;">
                    <h5>Resultaten van <span><?php echo $_SESSION['gebruikersnaam']; ?></span>:</h5>
                    <p>- Je hebt <span id="good"></span> vragen goed<br>- Je hebt <span id="wrong"></span> vragen fout</p>
                    <form action="setScore.php" method="post">
                        <input type="hidden" name="listId" id="listId" value="<?php echo $_POST['listId']; ?>">
                        <input type="hidden" name="goodBox" id="goodBox">
                        <input type="hidden" name="wrongBox" id="wrongBox">
                        <input type="submit" name="submit" class="btn btn-primary" value="Score opslaan">
                    </form>
                </div>
            </div>
        </div>
        <div class="progress" style="position: absolute; width: 75%; bottom: 50px;">
            <div class="progress-bar progress-bar-striped" id="progressBar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    </body>
    <script>loadQuestions(<?php echo $_POST['listId']; ?>);</script>
<?php
include "../Particals/footer.php";
?>