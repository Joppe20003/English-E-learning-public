<?php
session_start();

require '../Classes/Acces.php';
require '../Classes/Questions.php';
require '../Classes/Lists.php';
require '../Classes/Mode.php';
require '../Classes/Connection.php';

$modeClass = new Mode();
$connectionClass = new Connection();
$accesClasses = new Acces();
$questionsClass = new Questions();
$listsClass = new Lists();

$accesClasses->checkFormIsPressed();
$accesClasses->checkAccesEnglish();
$dataArrayQuestions = $questionsClass->getAllQuestionsByListId($_POST['listId'], $connectionClass->setConnection());

$dataArrayList = $listsClass->getListByListId($_POST['listId'], $connectionClass->setConnection());
$recordsList = $dataArrayList->fetch_assoc();

$listId = $_POST['listId'];

include '../Particals/header.php';
?>
<body class="wv-100 vh-100 bg-light d-flex flex-column">
<div class="container mb-auto">
    <div class="row">
        <div class="col-lg-12 h-100 mt-3">
            <div class="m-lg-3 p-lg-3 bg-white mt-lg-3 pt-3 pb-3 mt-3 p-3">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success w-50 mb-3" href="../Pages/lists.php">Terug</a>
                </div>
                <div class="mt-5 mb-5">
                    <div class="mt-3 mb-3">
                        <input type="hidden" id="listId" name="listId" value="<?php echo $listId; ?>">
                        <label for="name" class="form-label">Naam van de lijst:</label>
                        <input type="text" class="form-control" id="nameList" aria-describedby="nameList" name="nameList" value="<?php echo $recordsList['name'] ?>" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Beschrijving van de lijst:</label>
                        <input type="text" class="form-control" id="descriptionList" aria-describedby="descriptionList" value="<?php echo $recordsList['description'] ?>" name="descriptionList"" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="name" class="form-label">Mode van de lijst:</label>
                        <select class="form-select" aria-label="Default select example" id="modeId" required>
                            <option>Kies een mode</option>
                            <?php
                            $result = $modeClass->selectAllMode($connectionClass->setConnection());

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    foreach ($result as $row) {
                                        if ($recordsList['mode_id'] == $row['id']) {
                                            echo '<option value="' . $row['id'] . '" selected>' . $row['mode_name'] . '</option>';
                                        } else {
                                            echo '<option value="' . $row['id'] . '">' . $row['mode_name'] . '</option>';
                                        }
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row" id="makeQuestionsField"></div>
                <button type="submit" class="btn btn-primary" name="nextStep" onclick="registerUpdate()">Opslaan</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    setFieldsEdit(<?php echo $_POST['listId']; ?>);
    loadQuestionsEditLength(<?php echo $_POST['listId']; ?>);
</script>
<?php
include '../Particals/footer.php';
?>