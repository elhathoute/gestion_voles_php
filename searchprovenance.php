<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style1.css">
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

<div class="container">
<br><br><br>
<form action="" method="POST"><br>
<h1 class="h1">Flight search by origin:</h1><br>
    <select name="provenance" id="provenance">
    <option value="paris">Paris</option>
    <option value="london">Londres</option>
    <option value="newyork">New York</option>
    <option value="tokyo">Tokyo</option>
    <option value="dubai">Dubai</option>
    <option value="sydney">Sydney</option>
    <option value="rome">Rome</option>
    <option value="barcelona">Barcelone</option>
    <option value="berlin">Berlin</option>
    <option value="amsterdam">Amsterdam</option>
    <option value="beijing">Pékin</option>
    <option value="cairo">Le Caire</option>
    <option value="moscow">Moscou</option>
    <option value="istanbul">Istanbul</option>
    <option value="rio">Rio de Janeiro</option>
    <option value="cape">Le Cap</option>
    <option value="toronto">Toronto</option>
    <option value="mumbai">Mumbai</option>
    <option value="bangkok">Bangkok</option>
    <option value="sydney">Sydney</option>
    <!-- Ajoutez ici d'autres options de provenance -->
</select><br><br>
<h1 class="h1">Flight search by destination:</h1><br>
    <select name="destination" id="provenance">
    <option value="paris">Paris</option>
    <option value="london">Londres</option>
    <option value="newyork">New York</option>
    <option value="tokyo">Tokyo</option>
    <option value="dubai">Dubai</option>
    <option value="sydney">Sydney</option>
    <option value="rome">Rome</option>
    <option value="barcelona">Barcelone</option>
    <option value="berlin">Berlin</option>
    <option value="amsterdam">Amsterdam</option>
    <option value="beijing">Pékin</option>
    <option value="cairo">Le Caire</option>
    <option value="moscow">Moscou</option>
    <option value="istanbul">Istanbul</option>
    <option value="rio">Rio de Janeiro</option>
    <option value="cape">Le Cap</option>
    <option value="toronto">Toronto</option>
    <option value="mumbai">Mumbai</option>
    <option value="bangkok">Bangkok</option>
    <option value="sydney">Sydney</option>
    <!-- Ajoutez ici d'autres options de provenance -->
</select><br><br>
    <input type="submit" name="searchByProvenance" value="search" class="button">
</form>


 </div>
 <br><br><br>
 <?php
include('connexion.php');

if (isset($_POST['searchByProvenance'])) {
    // Récupérer la valeur de la provenance et de la destination
    $provenance = $_POST['provenance'];
    $destination = $_POST['destination'];

    // Connexion à la base de données
    if (!$conn) {
        die("Échec de la connexion à la base de données: " . mysqli_connect_error());
    }

    // Préparer la requête de recherche
    $sql = "SELECT v.*, a1.ville AS villeDepart, a1.pays AS paysDepart, a2.ville AS villeArrivee, a2.pays AS paysArrivee
            FROM vol v
            JOIN aeroport a1 ON v.idAeroportDepart = a1.idAeroport
            JOIN aeroport a2 ON v.idAeroportArrivee = a2.idAeroport
            WHERE a1.ville = '$provenance' AND a2.ville = '$destination'";

    // Exécuter la requête de recherche
    $result = mysqli_query($conn, $sql);

    // Vérifier si des résultats ont été trouvés
    if (mysqli_num_rows($result) > 0) {
        // Afficher les détails des vols trouvés dans un tableau
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

                    if ($data['
pagination']['total'] > 0) {
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
echo "Aucun vol trouvé pour cette provenance et cette destination.";
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



