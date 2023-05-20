<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>


select {
    width: 100%;
    height: 50px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    padding: 5px;
}



    </style>
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

<div class="container"><br><br><br>
<form action="" method="POST">
<h1 class="h1">Flight search by Compagnie aérienne:</h1><br><br>
   
    <select name="compagnie" id="compagnie">
        <option value="1">Air France</option>
        <option value="2">British Airways</option>
        <option value="3">Lufthansa</option>
        <option value="4">Emirates</option>
        <option value="5">Delta Air Lines</option>
        <!-- Ajoutez ici d'autres options pour les compagnies aériennes disponibles -->
    </select><br><br>
    <h1 class="h1">Flight search by Aéroport:</h1><br><br>
    
    <select name="aeroport" id="aeroport">
        <option value="CDG">Paris-Charles-de-Gaulle - CDG</option>
        <option value="LHR">London Heathrow (LHR)</option>
        <option value="JFK">John F. Kennedy International Airport (JFK)</option>
        <option value="DXB">Dubai International Airport (DXB)</option>
        <option value="HND">Tokyo Haneda Airport (HND)</option>
        <!-- Ajoutez ici d'autres options pour les aéroports disponibles -->
    </select>
    <input type="submit" name="searchByCompagnieAeroport" value="Search" class="button">


</form>



 </div>

 <?php
include('connexion.php');

if (isset($_POST['searchByCompagnieAeroport'])) {
    // Récupérer la valeur de la compagnie aérienne et de l'aéroport
    $compagnie = $_POST['compagnie'];
    $aeroport = $_POST['aeroport'];

    // Connexion à la base de données
    if (!$conn) {
        die("Échec de la connexion à la base de données: " . mysqli_connect_error());
    }

    // Préparer la requête de recherche
    $sql = "SELECT v.*, c.nom AS nomCompagnie, a.nom AS nomAeroport
            FROM vol v
            JOIN compagnie_aerienne c ON v.idCompagnie = c.idCompagnie
            JOIN aeroport a ON v.idAeroport = a.idAeroport
            WHERE v.idCompagnie = '$compagnie' AND v.idAeroport = '$aeroport'";

    // Exécuter la requête de recherche
    $result = mysqli_query($conn, $sql);

    // Vérifier si des résultats ont été trouvés
    if ($result && mysqli_num_rows($result) > 0) {
        // Afficher les détails des vols trouvés dans un tableau
        echo "<table>";
        echo "<tr><th>Numéro de vol</th><th>Compagnie aérienne</th><th>Aéroport</th><th>Heure de départ</th><th>Heure d'arrivée</th><th>Statut</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['numeroVol'] . "</td>";
            echo "<td>" . $row['nomCompagnie'] . "</td>";
            echo "<td>" . $row['nomAeroport'] . "</td>";
            echo "<td>" . $row['heureDepart'] . "</td>";
            echo "<td>" . $row['heureArrivee'] . "</td>";

            // Récupérer l'heure actuelle
            $heureActuelle = date('Y-m-d H:i:s');

            // Comparer l'heure actuelle avec l'heure de départ et d'arrivée pour déterminer l'état du vol
            if ($heureActuelle < $row['heureDepart']) {
                echo "<td>Vol programmé</td>";
            } elseif ($heureActuelle >= $row['heureDepart'] && $heureActuelle <= $row['heureArrivee']) {
                // Appel à l'API AviationStack pour obtenir les informations en temps réel sur le vol
                $api_key = "fe5a92536da500da37555af0a42d6b68"; // Remplacez par votre clé API AviationStack
                $flight_number = $row['numeroVol'];

                $endpoint = "http://api.aviationstack.com/v1/flights";
                $params = array(
                    'access_key' => $api_key,
                    'flight_iata' => $flight_number
                );
                $url = $endpoint . '?' . http_build_query($params);

                $response = file_get_contents($url);

                if ($response) {
                    $data = json_decode($response, true);

                    if ($data['pagination']['total'] > 0) {
                        // Affichage des informations en temps réel sur le vol
                        $flight = $data['data'][0];

$departure_airport = $flight['departure']['airport'];
$departure_city = $flight['departure']['city'];
$departure_country = $flight['departure']['country'];
$arrival_airport = $flight['arrival']['airport'];
$arrival_city = $flight['arrival']['city'];
$arrival_country = $flight['arrival']['country'];
echo "<td>En cours</td>";
echo "<tr><td colspan='6'>Informations en temps réel :</td></tr>";
echo "<tr><td colspan='6'>Aéroport de départ : $departure_airport, $departure_city, $departure_country</td></tr>";
echo "<tr><td colspan='6'>Aéroport d'arrivée : $arrival_airport, $arrival_city, $arrival_country</td></tr>";
} else {
echo "<td>En cours</td>";
echo "<tr><td colspan='6'>Aucune information en temps réel disponible pour le vol.</td></tr>";
}
} else {
echo "<td>En cours</td>";
echo "<tr><td colspan='6'>Erreur lors de la requête à l'API AviationStack.</td></tr>";
}
} else {
echo "<td>Terminé</td>";
}

echo "</tr>";
}
echo "</table>";
} else {
echo "Aucun vol trouvé pour cette compagnie aérienne et cet aéroport.";
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



