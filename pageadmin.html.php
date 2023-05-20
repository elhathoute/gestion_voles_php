<?php
include('connexion.php');

if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}

// Récupérer le nombre total de clients
$sqlTotalClients = "SELECT COUNT(*) AS total FROM client";
$resultTotalClients = mysqli_query($conn, $sqlTotalClients);
$rowTotalClients = mysqli_fetch_assoc($resultTotalClients);
$totalClients = $rowTotalClients['total'];

// Récupérer le nombre de clients connectés
$sqlClientsConnectes = "SELECT COUNT(*) AS connectes FROM client WHERE last_login IS NOT NULL";
$resultClientsConnectes = mysqli_query($conn, $sqlClientsConnectes);
$rowClientsConnectes = mysqli_fetch_assoc($resultClientsConnectes);
$clientsConnectes = $rowClientsConnectes['connectes'];

// Calculer le pourcentage de clients connectés
$pourcentageConnectes = ($clientsConnectes / $totalClients) * 100;

// Calculer le nombre de clients non connectés
$clientsNonConnectes = $totalClients - $clientsConnectes;

mysqli_close($conn);
?>
<!-- admin aerport-->
<?php
include('connexion.php');

if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}

// Récupérer le nombre total d'administrateurs aéroportuaires
$sqlTotalAdmins = "SELECT COUNT(*) AS total FROM administrateuraeroport";
$resultTotalAdmins = mysqli_query($conn, $sqlTotalAdmins);
$rowTotalAdmins = mysqli_fetch_assoc($resultTotalAdmins);
$totalAdmins = $rowTotalAdmins['total'];

// Récupérer le nombre d'administrateurs aéroportuaires connectés
$sqlAdminsConnectes = "SELECT COUNT(*) AS connectes FROM administrateuraeroport WHERE last_login IS NOT NULL";
$resultAdminsConnectes = mysqli_query($conn, $sqlAdminsConnectes);
$rowAdminsConnectes = mysqli_fetch_assoc($resultAdminsConnectes);
$adminsConnectes = $rowAdminsConnectes['connectes'];

// Calculer le pourcentage d'administrateurs aéroportuaires connectés
$pourcentageConnectes = ($adminsConnectes / $totalAdmins) * 100;

// Calculer le nombre d'administrateurs aéroportuaires non connectés
$adminsNonConnectes = $totalAdmins - $adminsConnectes;

mysqli_close($conn);
?>


<!--vols-->
<?php
include('connexion.php');

if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}

// Récupérer le nombre total de vols
$sqlTotalVols = "SELECT COUNT(*) AS total FROM vol";
$resultTotalVols = mysqli_query($conn, $sqlTotalVols);
$rowTotalVols = mysqli_fetch_assoc($resultTotalVols);
$totalVols = $rowTotalVols['total'];

// Récupérer le nombre de vols annulés
$sqlVolsAnnules = "SELECT COUNT(*) AS annules FROM vol_annule WHERE id_vol_annule = 1"; // Remplacez 0 par l'ID correspondant au statut "annulé" dans votre base de données
$resultVolsAnnules = mysqli_query($conn, $sqlVolsAnnules);
if (!$resultVolsAnnules) {
    die("Erreur SQL lors de la récupération des vols annulés: " . mysqli_error($conn));
}
$rowVolsAnnules = mysqli_fetch_assoc($resultVolsAnnules);
$volsAnnules = $rowVolsAnnules['annules'];

// Récupérer le nombre de vols retardés
$sqlVolsRetardes = "SELECT COUNT(*) AS retardes FROM vol_retarde WHERE id_vol_retarde = 1"; // Remplacez 1 par l'ID correspondant au statut "retardé" dans votre base de données

$resultVolsRetardes = mysqli_query($conn, $sqlVolsRetardes);
if (!$resultVolsRetardes) {
    die("Erreur SQL lors de la récupération des vols retardés: " . mysqli_error($conn));
}
$rowVolsRetardes = mysqli_fetch_assoc($resultVolsRetardes);
$volsRetardes = $rowVolsRetardes['retardes'];

// Calculer le pourcentage de vols par rapport au total
$pourcentageVols = ($totalVols > 0) ? ($volsAnnules + $volsRetardes) / $totalVols * 100 : 0;

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Med<span>Ex</span></h2>
        </div>
        <div class="search--notification--profile">
           <div class="search">
                <input type="text" placeholder="Search Scdule..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon lock">
                 <a href="pagelogout.php">   <i class="ri-lock-line"></i></a>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div class="picon profile">
                    <img src="images/admin.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="pageadmin.html.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pagecustomer.php">
                        <span class="icon icon-2"><i class="ri-user-follow-line"></i></span>
                        <span class="sidebar--item">Customer</span>
                    </a>
                </li>
                <li>
                    <a href="pageairadmin.php">
                        <span class="icon icon-3"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Airport Administrator</span>
                    </a>
                </li>
                <li>
                    <a href="pageflight.php">
                        <span class="icon icon-4"><i class="ri-flight-takeoff-line"></i></span>
                        <span class="sidebar--item">Flights</span>
                    </a> 
                </li>
                <li>
                    <a href="pagedlayedflights.php">
                        <span class="icon icon-5"><i class="ri-flight-land-line"></i></span>
                        <span class="sidebar--item">Delayed Flights</span>
                    </a>
                </li>
                <li>
                    <a href="pagecanceledflighrs.php">
                        <span class="icon icon-6"><i class="ri-flight-land-line"></i></span>
                        <span class="sidebar--item">Canceled Flights</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <!--<li>
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
            </ul>-->
        </div>
        <div class="main--content">
            <div class="overview">
                <div class="title">
                    <h2 class="section--title">Overview</h2>
                    <div class="doctors--right--btns">
                      
                      <button class="add"><a href="addflight.php"><i class="ri-add-line"></i>Add Flights</a></button>
                  </div>
                  <!--  <select name="date" id="date" class="dropdown">
                        <option value="today">Today</option>
                        <option value="lastweek">Last Week</option>
                        <option value="lastmonth">Last Month</option>
                        <option value="lastyear">Last Year</option>
                        <option value="alltime">All Time</option>
                    </select>-->
                </div>
                <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Customer</h5>
                                <h1><?php echo $totalClients; ?></h1>
                            </div>
                            <i class="ri-user-follow-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i><?php echo round($pourcentageConnectes, 2); ?>%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i><?php echo $clientsConnectes; ?></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i><?php echo $clientsNonConnectes; ?></span>
                        </div>
                    </div>
                    <div class="card card-2">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Airport Administrator</h5>
                                <h1><?php echo $totalAdmins; ?></h1>
                            </div>
                            <i class="ri-admin-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i><?php echo round($pourcentageConnectes, 2); ?>%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i><?php echo $adminsConnectes; ?></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i><?php echo $adminsNonConnectes; ?></span>
                        </div>
                    </div>
                    <div class="card card-3">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Flights</h5>
                                <h1><?php echo $totalVols; ?></h1>
                            </div>
                            <i class="ri-flight-takeoff-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i><?php echo round($pourcentageVols, 2); ?>%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i><?php echo $volsRetardes; ?></span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i><?php echo $volsAnnules; ?></span>
                        </div>
                    </div>
                <!--    <div class="card card-4">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Delayed Flights</h5>
                                <h1>15</h1>
                            </div>
                            <i class="ri-flight-land-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>8%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>11</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>2</span>
                        </div>
                    </div>
                    <div class="card card-5">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Canceled Flights</h5>
                                <h1>152</h1>
                            </div>
                            <i class="ri-flight-land-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>65%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>10</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>2</span>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="doctors">
                <div class="title">
                    <h2 class="section--title">Airport Administrator</h2>
                    <div class="doctors--right--btns">
                      
                        <button class="add"><a href=""><i class="ri-add-line"></i>Add AirAdmin</a></button>
                    </div>
                </div>
             <!--   
                include('connexion.php');
                
                    if(!$conn){
                        die("connection failed ".mysqli_connect_error());
                    }
                    $sql="SELECT * FROM administrateur_aeroport " ;
                    $req=mysqli_query($conn,$sql);
                    $nbr=mysqli_num_rows($req);
               
                   ?>
                    <div class="doctors--cards">
                 
                    while ($ligne=mysqli_fetch_assoc($req)){
                       
                         ?>    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                       <div class="img--box">".
                           <
                           echo  $ligne['PHOTO'];?>
                           </div>
                        </div>
                        <p class="free">
                     < echo  $ligne['nom_admin_aeroport'];?>
                     </p>
                    </a>
                    <
                       
                             } 
                  mysqli_close($conn);
            
                ?>-->
                <?php
include('connexion.php');

if (!$conn) {
    die("connection failed " . mysqli_connect_error());
}

$sql = "SELECT * FROM administrateuraeroport ORDER BY last_login DESC LIMIT 10";
$req = mysqli_query($conn, $sql);

if (!$req) {
    die("Error executing query: " . mysqli_error($conn));
}

?>
<div class="doctors--cards">
    <?php while ($ligne = mysqli_fetch_assoc($req)) { ?>
        <a href="#" class="doctor--card">
            <div class="img--box--cover">
                <div class="img--box">
                    <?php
                    // Affichez l'image de l'administrateur
                    echo "<img src='" . $ligne['PHOTO'] . "' alt='Photo'>";
                    ?>
                </div>
            </div>
            <p class="free">
                <?php echo $ligne['nom']." ".$ligne['prenom']; ?>
            </p>
        </a>
    <?php
    }
    mysqli_close($conn);
    ?>


                          
                                
                            
            
            </div>
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title">Customer</h2>
                    <button class="add"><a href="#"><i class="ri-add-line"></i>Add Customer</a></button>
                </div>

                
	
                <?php
include('connexion.php');
                
if(!$conn){
    die("connection failed ".mysqli_connect_error());
}
$reqselect="SELECT * FROM client ORDER BY last_login DESC LIMIT 1";
$resultat=mysqli_query($conn,$reqselect);
?>
<div class="table">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Penom</th>
                <th>email</th>
                <th>password</th>
                <!--<th>Status</th>-->
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($ligne=mysqli_fetch_assoc($resultat))
        {
        ?>
            <tr>
                <td><?php echo $ligne['idClient']; ?></td>
                <td><?php echo $ligne['nom']; ?></td>
                <td><?php echo $ligne['prenom']; ?></td>
                <td><?php echo $ligne['email']; ?></td>
                <td><?php echo $ligne['motDePasse']; ?></td>
                <td><span><a href="modifierboutique.php?mod=<?php echo $ligne['idClient']; ?>"><i class="ri-edit-line edit"></i></a><a href="supprimerfleurs.php?supid=<?php echo $ligne['idClient']; ?>"><i class="ri-delete-bin-line delete"></i></a></span></td>
            </tr>
        <?php } mysqli_close($conn);?>
        </tbody>
    </table>
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