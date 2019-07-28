<div class="collection">
    <ul>
        <?php $list = Einkaufsliste::getAllEinkaufsliste();
        foreach ($list as $value => $l) { ?>
            <?php if ($l->status == 'active') { ?>
                <li class="collection-item">
                    <label>
                        <input type="checkbox" checked="checked"/>
                        <span><?php echo $l->name ?></span>
                    </label>
                    <a href="php/delete.php?Name=<?= $l->name ?>" class="secondary-content"><i class="material-icons">delete</i></a>
                </li>
            <?php } else { ?>
                <li class="collection-item">
                    <label>
                        <input type="checkbox"/>
                        <span><?php echo $l->name ?></span>
                    </label>
                    <a href="php/delete.php?Name=<?= $l->name ?>" class="secondary-content"><i class="material-icons">delete</i></a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>