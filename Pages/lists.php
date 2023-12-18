<?php
session_start();

require '../Classes/Acces.php';
require '../Classes/Lists.php';
require '../Classes/Mode.php';
require '../Classes/Connection.php';

$connectionClass = new Connection();
$modeClass = new Mode();
$accesClasses = new Acces();
$listsClass = new Lists();

$accesClasses->checkAccesEnglish();

include '../Particals/header.php';
?>
<body class="wv-100 vh-100 bg-light d-flex flex-column">
<div class="container mb-auto">
    <div class="row">
        <div class="col-lg-12 h-100 mt-3">
            <div class="m-lg-3 p-lg-3 bg-white mt-lg-3 pt-3 pb-3 mt-3 mb-3">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success w-50" href="../Pages/makeLists.php">Lijst maken</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 h-100 mb-3">
            <div class="bg-white p-lg-3 m-lg-3 rounded pt-3 pb-3 mb-3">
                <div class="m-lg-3 col-lg-12 m-lg-2 rounded m-3">
                    <h5>Al mijn lijsten:</h5>
                </div>
                <?php
                $result = $listsClass->getPriveLists($connectionClass->setConnection(), $_SESSION['users_id']);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        foreach ($result as $row) {
                            echo '<div class="m-lg-2 bg-light p-lg-3 hover-background-gray mt-3 mb-3 pt-3 pb-3 rounded m-3 p-3">
                    <h6>' . $row['lists_name'] . '</h6>
                    <p>' . $row['description'] . '</p>
                    <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <form action="playList.php" method="post">
                            <input type="hidden" name="listId" id="listId" value="' . $row['lists_id'] . '">
                            <input type="hidden" name="listUserId" id="listUserId" value="' . $row['users_id'] . '">
                            <input type="hidden" name="mode" id="mode" value="' . $row['mode_name'] . '">
                            <input type="submit" class="btn btn-primary" value="Maken">
                        </form>
                        <form action="editLists.php" method="post" style="margin-left: 5px !important;">
                            <input type="hidden" id="listId" name="listId" value="' . $row['lists_id'] . '">
                            <input type="hidden" name="listUserId" id="listUserId" value="' . $row['users_id'] . '">
                            <input type="hidden" name="mode" id="mode" value="' . $row['mode_name'] . '">
                            <input type="submit" name="submit" class="btn btn-secondary" value="Wijzigingen">
                        </form>
                    </div>
                    <p class="m-0 d-flex align-self-end">Lijst mode: ' . $row[ 'mode_name'] . '</p>
                    </div>
                </div>';
                        }
                    }
                } else {
                    echo '<div class="m-3">Geen lijsten gevonden</div>';
                }
                ?>
            </div>
        </div>
        <div class="col-lg-6 h-100 mb-3">
            <div class="bg-white p-lg-3 m-lg-3 rounded pt-3 pb-3 mb-3">
                <div class="m-lg-3 col-lg-12 m-lg-2 rounded m-3">
                    <h5>Alle andere lijsten:</h5>
                </div>
                <?php
                $result = $listsClass->getPublicLists($connectionClass->setConnection());

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        foreach ($result as $row) {
                            echo '<div class="m-lg-2 bg-light p-lg-3 hover-background-gray mt-3 mb-3 pt-3 pb-3 rounded m-3 p-3">
                    <h6>' . $row['lists_name'] . '</h6>
                    <p>' . $row['description'] . '</p>
                    <div class="d-flex justify-content-between">
                        <form class="m-0" method="post" action="playList.php">
                            <input type="hidden" name="listId" id="listId" value="' . $row['lists_id'] . '">
                            <input type="hidden" name="listUserId" id="listUserId" value="' . $row['users_id'] . '">
                            <input type="hidden" name="mode" id="mode" value="' . $row['mode_name'] . '">
                            <input type="submit" class="btn btn-primary" value="Maken">
                        </form>
                        <p class="m-0 d-flex align-self-end">Lijst mode: ' . $row[ 'mode_name'] . '</p>
                    </div>
                </div>';
                        }
                    }
                } else {
                    echo '<div class="m-3">Geen lijsten gevonden</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
<footer>
    <div class="bg-white pt-1 pb-1 mt-3 d-flex justify-content-center">
        Copyright: © Alle rechten voor behouden 2021 - <script>document.write(new Date().getFullYear())</script>
    </div>
</footer>
</html>
