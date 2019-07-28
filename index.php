<?php include 'templates/head.php' ?>
    <div class="container login valign-wrapper">
        <form class="row" action="php/login.php" method="post">
            <div class="input-field col s12">
                <input type="text" id="autocomplete-input" class="autocomplete" name="userName">
                <label for="autocomplete-input">User Name</label>
            </div>
            <div class="input-field col s12">
                <input type="password" id="autocomplete-password" class="autocomplete" name="password">
                <label for="autocomplete-password">Password</label>
            </div>
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="login">
                    Anmelden <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
<?php include 'templates/bottom.php' ?>