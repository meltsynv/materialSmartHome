<?php
require_once('../inc/Einkaufsliste.php');

if (isset($_GET['Name'])) {
    $eListe = Einkaufsliste::delete($_GET['Name']);

    header('Location: ../einkaufsliste.php');

}
