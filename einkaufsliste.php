<?php include 'templates/head.php' ?>
<?php include 'templates/nav.php' ?>
<?php require_once('inc/Einkaufsliste.php') ?>

    <div class="container <?php PageTitle::getPageTitle() ?>">
        <div class="collection">
            <?php $list = Einkaufsliste::getAllEinkaufsliste();
            foreach ($list as $value => $l) { ?>
                <?php if ($l->status == 'active') { ?>
                    <a href="#!" class="collection-item ">
                        <label>
                            <input type="checkbox" checked="checked"/>
                            <span><?php echo $l->name ?></span>
                        </label>
                    </a>
                <?php } else { ?>
                    <a href="#!" class="collection-item ">
                        <label>
                            <input type="checkbox"/>
                            <span><?php echo $l->name ?></span>
                        </label>
                    </a>
                <?php } ?>

            <?php } ?>
        </div>
    </div>
<?php include 'templates/bottom.php' ?><?php
