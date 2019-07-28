<?php
require_once ('inc/PageTitle.php')
?>
<nav>
    <div class="nav-wrapper">
        <ul>
            <li><a href="home.php"><i class="large material-icons">arrow_back</i></a></li>
            <li><h5><?php PageTitle::getPageTitle() ?></h5></li>
            <li><a href="#"><i class="large material-icons">phonelink_lock</i></a></li>
        </ul>
    </div>
</nav>