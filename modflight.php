		
<?php
include('connexion.php');

if (isset($_POST['btmodflight'])) {
    // Récupérer les valeurs du formulaire
    $idVol = $_POST['idVol'];
    $numeroVol = $_POST['numeroVol'];
    $heureDepart = $_POST['heureDepart'];
    $heureArrivee = $_POST['heureArrivee'];
    $idAeroportDepart = $_POST['idAeroportDepart'];
    $idAeroportArrivee = $_POST['idAeroportArrivee'];
    $idCompagnie = $_POST['idCompagnie'];
    $idStatut = $_POST['idStatut'];
	$modifier=(int) ($_GET["mod"]);

    if (!$conn) {
        die("Échec de la connexion à la base de données: " . mysqli_connect_error());
    }

    $sql = "UPDATE vol SET idVol = ' $idVol', numeroVol = '$numeroVol' , heureDepart ='$heureDepart',heureArrive ='$heureArrive',idAeroportDepart ='$idAeroportDepart',idCompagnie='$idCompagnie',idStatut ='$idStatut' WHERE idVol ='".$_GET["mod"]."'";
    $resultat=mysqli_query($conn,$sql);

if($resultat)
{
echo "Mise a jour des données validés";
header('location :pageflight.php');
}else{
echo "Echec de modification des données !";
header('location :pageflight.php');
}
   mysqli_close($conn);
}
   

?>
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
        <div class="search--notification--profile">
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
                 <!--   <button class="add"><a href="Ajouterboutique.php"><i class="ri-add-line"></i>Add AirAdmin</a></button>
--></div>
                <div class="container">
            <br>
    <h1 class="h1">Update Flight:</h1><br><br>
    <form action="" method="post">
    <input type="text" name="idVol" placeholder="ID du vol" required>
    <input type="text" name="numeroVol" placeholder="Numéro de vol" required>
    <input type="datetime-local" name="heureDepart" placeholder="Heure de départ" required>
    <input type="datetime-local" name="heureArrivee" placeholder="Heure d'arrivée" required>
    <input type="text" name="idAeroportDepart" placeholder="ID de l'aéroport de départ">
    <input type="text" name="idAeroportArrivee" placeholder="ID de l'aéroport d'arrivée">
    <input type="text" name="idCompagnie" placeholder="ID de la compagnie">
    <input type="text" name="idStatut" placeholder="ID du statut">
    <input type="submit" name="btlodflight" value="Update Flight" class="button">
</form>
              


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