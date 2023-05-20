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
 
            <div class="container" id="main" >

            
            <form action="" method="post" class="formulaire">
                <br><br><br>
                <h1 class="h1">Connexion d'Administrateur Aeroport:</h1>
                <br><br>
 <label><b>Identificateur d'Administrateur</b></label>
 <input type="text" placeholder="Entrer vote email " name="txtlogin" required>
<br>
<label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="txtpw" required>
<br>
                <input   type="submit" name="btlogin" value='LOGIN' class="button" >
                
     
            </form>
        </div>




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

<?php 
  if(isset($_POST['btlogin'])){
   
    $req="select * from admin where admin_email='".$_POST['txtlogin']."' ";
    if($resultat=mysqli_query($conn,$req)){
    $ligne=mysqli_fetch_assoc($resultat);
    if($ligne!=0)
    {
    session_start();
    $_SESSION['login']= $_POST['txtlogin'];
   echo "Bienvenue".$_SESSION['login'];
   header('pageadmin.html.php');
       
    }
    else {
    echo "<font color='#F0001D'>Login ou mot des passe est invalide !!!!</font>";
    } } }
    
        


?>