<?php

class Acces
{
    public function checkAccesEnglish() {
        if (isset($_SESSION['session_id']) && $_SESSION['session_id'] == session_id()) {
            $startDateSeconds = $_SESSION['date_loged_in_seconds'];

            $nowDate = date('d-m-y h:i:s');
            $startDateSecondsEnds = $startDateSeconds + (2.5 * (60 * 60));
            $nowDateSeconds = strtotime($nowDate);

            if($startDateSecondsEnds < $nowDateSeconds) {
                header( "Refresh:0.1; url=logout.php", true, 303);
            }
        } else {
            header( "Refresh:0.1; url=login.php", true, 303);
        }
    }

    public function checkFormIsPressed() {
        if (!isset($_POST['submit'])) {
            header( "Refresh:0.1; url=lists.php", true, 303);
        }
    }

    public function checkIsOwnList($userIdList, $mode) {
        if ($mode == "Prive") {
            if (!isset($_SESSION['users_id']) && $_SESSION['users_id'] !== $userIdList) {
                header("Refresh:0.1; url=lists.php", true, 303);
            }
        }
    }
}