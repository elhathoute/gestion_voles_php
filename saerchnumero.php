<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
<section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Med<span>Ex</span></h2>
        </div>
    <!--    <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search Scdule..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon lock">
                    <i class="ri-lock-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div class="picon profile">
                    <img src="images/admin.jpg" alt="">
                </div>-->
            </div>
        </div>
    </section>    
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="pageprincipale.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-home-4-line"></i></span>
                        <span class="sidebar--item">Home </span>
                    </a>
                </li>
                <li>
                    <a href="conxadmin.php">
                        <span class="icon icon-2"><i class="ri-user-settings-line"></i></span>
                        <span class="sidebar--item">Administrator</span>
                    </a>
                </li>
                <li>
                    <a href="airadmin.php">
                        <span class="icon icon-3"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Airport Administrator</span>
                    </a>
                </li>
                <li>
                    <a href="pagelogin.php">
                        <span class="icon icon-4"><i class="ri-user-follow-line"></i></span>
                        <span class="sidebar--item">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="searchflights.php">
                        <span class="icon icon-5"><i class="ri-flight-takeoff-line"></i></span>
                        <span class="sidebar--item"> Flights</span>
                    </a>
                </li>
              <!--  <li>
                    <a href="pagecanceledflighrs.php">
                        <span class="icon icon-6"><i class="ri-flight-land-line"></i></span>
                        <span class="sidebar--item">Canceled Flights</span>
                    </a>
                </li>-->
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="#">
                        <span class="icon icon-7"><i class="ri-settings-3-line"></i></span>
                        <span class="sidebar--item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="pagelogout.php">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
        <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title"></h2>
                  <!--  <button class="add"><a href="Ajouterboutique.php"><i class="ri-add-line"></i>Add AirAdmin</a></button>-->
              </div>    
            </div>

<div class="container"><br><br><br><br>
    <!-- Recherche de vol par numéro -->
    <h1 class="h1">Flight search by number:</h1><br><br><br>
<form action="" method="POST">
   
    <input type="text" name="numVol" id="numVol" placeholder="Numéro de vol"> <br><br>
    <input type="submit" name="searchByNum" value="Search" class="button">
</form>
</div>
<br><br><br><br>
<?php
include('connexion.php');

if (isset($_POST['searchByNum'])) {
    // Récupérer la valeur du numéro de vol
    $numVol = $_POST['numVol'];

    // Connexion à la base de données
    if (!$conn) {
        die("Échec de la connexion à la base de données: " . mysqli_connect_error());
    }

    // Préparer la requête de recherche
    $sql = "SELECT v.*, a1.ville AS villeDepart, a1.pays AS paysDepart, a2.ville AS villeArrivee, a2.pays AS paysArrivee
            FROM vol v
            JOIN aeroport a1 ON v.idAeroportDepart = a1.idAeroport
            JOIN aeroport a2 ON v.idAeroportArrivee = a2.idAeroport
            WHERE v.numeroVol = '$numVol'";

    // Exécuter la requête de recherche
    $result = mysqli_query($conn, $sql);

    // Vérifier si des résultats ont été trouvés
    if (mysqli_num_rows($result) > 0) {
        // Afficher les détails du vol trouvé dans un tableau
        echo "<table>";
        echo "<tr><th>Numéro de vol</th><th>Aéroport de départ</th><th>Aéroport d'arrivée</th><th>Heure de départ</th><th>Heure d'arrivée</th><th>Statut</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['numeroVol'] . "</td>";
            echo "<td>" . $row['villeDepart'] . ", " . $row['paysDepart'] . "</td>";
            echo "<td>" . $row['villeArrivee'] . ", " . $row['paysArrivee'] . "</td>";
            echo "<td>" . $row['heureDepart'] . "</td>";
            echo "<td>" . $row['heureArrivee'] . "</td>";

            // Récupérer l'heure actuelle
            $heureActuelle = date('Y-m-d H:i:s');

            // Comparer l'heure actuelle avec l'heure de départ et d'arrivée pour déterminer l'état du vol
            if ($heureActuelle < $row['heureDepart']) {
                echo "<td>Vol programmé</td>";
            } elseif ($heureActuelle >= $row['heureDepart'] && $heureActuelle <= $row['heureArrivee']) {
                echo "<td>En cours</td>";
/*// Accéder à l'API FlightRadar24 pour obtenir les informations en temps réel
$apiKey = 'YOUR_API_KEY';
$flightIata = $row['numeroVol'];

// Créer l'URL de requête
$url = "https://api.flight-radar24.com/v1/flight/details/$flightIata?token=$apiKey";

// Effectuer la requête
$response = file_get_contents($url);
$responseData = json_decode($response, true);

// Vérifier si la requête a réussi
if (isset($responseData['status']['text']) && $responseData['status']['text'] === 'ok') {
    $flightData = $responseData['result']['response']['data'][0]; // Première occurrence du vol trouvé

    // Afficher les informations en temps réel
    echo "<td>Informations en temps réel :<br>";
    echo "Vitesse : " . $flightData['speed']['horizontal'] . " km/h<br>";
    echo "Altitude : " . $flightData['altitude']['feet'] . " pieds<br>";
    echo "Cap : " . $flightData['track']['true'] . " degrés<br>";

    // Afficher la carte
    echo "<iframe src='https://www.flightradar24.com/data/airplanes/{$flightData['identification']['icao']}/' width='100%' height='500'></iframe>";
} else {
    echo "<td>Informations en temps réel indisponibles</td>";
}
 */
$queryString = http_build_query([
    'access_key' => '27be0b5b7300d1ce68e434f6ca5f4740'
]);

$ch = curl_init(sprintf('%s?%s', 'https://api.aviationstack.com/v1/flights', $queryString));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);

$api_result = json_decode($json, true);

if(isset($api_result['results']) && is_array($api_result['results'])) {
    foreach ($api_result['results'] as $flight) {
        if (isset($flight['live']) && !$flight['live']['is_ground']) {
            echo sprintf("%s flight %s from %s (%s) to %s (%s) is in the air.",
                $flight['airline']['name'],
                $flight['flight']['iata'],
                $flight['departure']['airport'],
                $flight['departure']['iata'],
                $flight['arrival']['airport'],
                $flight['arrival']['iata']
            ), PHP_EOL;
        }
    }
} else {
    echo "<td>Real-time information unavailable</td>";
}

            } else {
                echo "<td>Terminé</td>";
            }
    
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun vol trouvé avec ce numéro.";
    }
    
    // Fermer la connexion à la base de données
    mysqli_close($conn);}
?>    



 


                </div>

                
	
		
            </div>
        </div>
    </section>
    <script >
        let menu = document.querySelector('.menu')
let sidebar = document.querySelector('.sidebar')
let mainContent = document.querySelector('.main--content')

menu.onclick = function() {
    sidebar.classList.toggle('active')
    mainContent.classList.toggle('active')
}
    </script>              
</body>
</html>





