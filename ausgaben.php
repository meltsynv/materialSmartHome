<?php include 'templates/head.php' ?>
<?php include 'templates/nav.php' ?>
<?php require_once('inc/Ausgaben.php') ?>

    <div class="container einkaufsliste">
        <div class="addItem">
            <form class="row" action="php/insert.php" method="post">
                <div class="input-field col s10">
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
            <canvas height="50vh" width="50vw" id="myChart"></canvas>
    </div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Karo', 'Timo'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: ["#656383", "#7d8b6e"],
                data: [33, 77]
            }]
        },

        // Configuration options go here
        options: {
        }
    });
</script>
<?php include 'templates/bottom.php' ?><?php