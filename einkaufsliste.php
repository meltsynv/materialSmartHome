<?php include 'templates/head.php' ?>
<?php include 'templates/nav.php' ?>
<?php require_once('inc/Einkaufsliste.php') ?>

    <div class="container einkaufsliste">
        <div class="addItem">
            <form class="row" action="php/insert.php" method="post">
                <div class="input-field col s11">
                    <input type="text" id="autocomplete-Name" class="autocomplete" name="Name">
                    <label for="autocomplete-Name">Produkt</label>
                </div>
                <div class="input-field col s1">
                    <button class="btn waves-effect waves-light" type="submit" name="insertEList">
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
        <?php include 'Module/liste.php'?>
    </div>
<?php include 'templates/bottom.php' ?><?php
