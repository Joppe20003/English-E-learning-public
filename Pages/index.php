<?php
session_start();

include '../Particals/header.php';
?>
<body class="wv-100 hv-100 bg-light d-flex flex-column">
<div class="container mb-auto">
    <div class="alert alert-danger mt-3" role="alert" id="alertDangerIndex" style="display: none;">
        <div class="d-flex justify-content-center">
            <div class="alert-link">LET OP! </div>
            <div id="alertDangerIndexText" style="margin-left: 7.5px"></div>
        </div>
    </div>
    <div class="alert alert-success mt-3" role="alert" id="alertSuccessIndex" style="display: none;">
        <div class="d-flex justify-content-center">
            <div id="alertSuccessIndexText" style="margin-left: 7.5px"></div>
        </div>
    </div>
    <div class="row" style="position: relative">
        <div class="col-lg-12 h-100 mt-3">
            <div class="m-lg-3 p-lg-3 bg-white mt-lg-3 pt-3 pb-3 mt-3 mb-3">
                <h6 class="d-flex justify-content-center">Lees hieronder wat je op onze site kan doen en wie we zijn</h6>
            </div>
        </div>
        <div class="col-lg-6 h-100 mb-3">
            <div class="bg-white p-lg-3 m-lg-3 rounded pt-3 pb-3 mb-3">
                <div class="m-lg-3 col-lg-12 m-lg-2 rounded m-3">
                    <h6>Wie zijn wij?</h6>
                    <p>"De jongeren van tegenwoordig lezen geen boeken meer en zitten liever op internet" Is de opvatting van de stichting Better English for Kids (BEK). Wij zijn een stichting voor het makkelijker maken voor kinderen om engels te leren. <br></br>Wij hebben deze staat online staan zodat wij meer de jeugd zo bereiken en natuurlijk onze site gaan gebruiken voor hun engels te oefenen.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 h-100 mb-3">
            <div class="bg-white p-lg-3 m-lg-3 rounded pt-3 pb-3 mb-3">
                <div class="m-lg-3 col-lg-12 m-lg-2 rounded m-3">
                    <h6>Wat kan je doen op onze site?</h6>
                    <p>Om kinderen beter engels te laten leren hebben wij deze site online. Je kan op onze site zelf lijsten aan maken met vragen. Deze lijsten kan je dan vervolgens gaan spelen en krijgt aan het einde ook gelijk een score.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<footer>
    <div class="bg-white pt-1 pb-1 mt-1 d-flex justify-content-center">
        Copyright: © Alle rechten voor behouden 2021 - <script>document.write(new Date().getFullYear())</script>
    </div>
</footer>
</html>
<?php
if (isset($_SESSION['session_id'])) {
    if ($_SESSION['logged_in'] == 1) {
        echo '<script>setMessageAlertBoxLogin("alertSuccessIndex","alertSuccessIndexText","Succes vol ingelogd")</script>';

        $_SESSION['logged_in'] = 2;
    }
} else {
    echo '<script>setMessageAlertBoxLogin("alertDangerIndex","alertDangerIndexText","nog niet ingelogd, log in om lijsten aan te maken en te spelen")</script>';
}
?>