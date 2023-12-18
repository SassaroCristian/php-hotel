<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];    


    if (isset($_GET['voto'])) {
        $voto = intval($_GET['voto']);
        $distanza = isset($_GET['distanza']) ? floatval($_GET['distanza']) : PHP_INT_MAX;
        $postoAuto = isset($_GET['postoAuto']) ? boolval($_GET['postoAuto']) : false;
        $hotelsFiltrati = array_filter($hotels, function ($hotel) use ($voto, $distanza, $postoAuto) {
            if ($postoAuto) {
                return $hotel['vote'] >= $voto && $hotel['distance_to_center'] <= $distanza && $hotel['parking'] == true;
            } else {
                return $hotel['vote'] >= $voto && $hotel['distance_to_center'] <= $distanza && $hotel['parking'] == false;
            }
        });
    } else {
        $hotelsFiltrati = $hotels;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title> 
</head>
<body>
<div class="container">
    <h2>Hotels</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody
            <?php
            foreach ($hotelsFiltrati as $hotel) {
                echo "<tr>";
                echo "<td>{$hotel['name']}</td>";
                echo "<td>{$hotel['description']}</td>";
                echo "<td>";
                    if ($hotel['parking']) {
                    echo "Sì";
                         } else {
                    echo "No";
                        }
                    echo "</td>";
                echo "<td>{$hotel['vote']}</td>";
                echo "<td>{$hotel['distance_to_center']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>