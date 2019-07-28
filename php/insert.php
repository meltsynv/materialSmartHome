<?php
require_once ('../inc/Einkaufsliste.php');

if (isset($_POST['Name'])){
    $eListe = Einkaufsliste::create($_POST['Name'], ' ');

    if ($eListe){
        header('Location: ../einkaufsliste.php');
    }
}