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


function filterHotels($hotels, $filterParking, $filterVote)
{
    $filteredHotels = [];

    foreach ($hotels as $hotel) {

        if ((!$filterParking || $hotel['parking']) && ($hotel['vote'] >= $filterVote)) {
            $filteredHotels[] = $hotel;
        } 
    }

    return $filteredHotels;
}


$filterParking = isset($_GET['parking']) ? true : false;
$filterVote = isset($_GET['vote']) ? intval($_GET['vote']) : 0;

$filteredHotels = filterHotels($hotels, $filterParking, $filterVote);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form method="get" class="m-3">
        <label for="parking">Parcheggio</label>
        <input type="checkbox" name="parking" id="parking" <?php echo ($filterParking) ? 'checked' : ''; ?>>
        <br>
        <label for="vote">Voto (da 1 a 5)</label>
        <input type="number" name="vote" id="vote" min="1" max="5" value="<?php echo $filterVote; ?>">

        <button type="submit">Filtra</button>
    </form>

    <ul class="border border-dark list-unstyled">
        <?php foreach ($filteredHotels as $hotel) { ?>
            <li class="border border-warning m-3">
                <div class="h4 font-family-sans-serif">
                    <?php echo $hotel['name'] . ' - ' . $hotel['description'] . ': ' . $hotel['parking'] . ' - ' . $hotel['vote'] . ' - ' . $hotel['distance_to_center'] . 'm'; ?>
                </div>
            </li>
        <?php } ?>
    </ul>
</body>
</html>

