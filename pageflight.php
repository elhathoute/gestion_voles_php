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
                    <h2 class="section--title">Flights</h2>
                    <button class="add"><a href="addflight.php"><i class="ri-add-line"></i>Add Flight</a></button>
                </div>

                             
                <?php
         include('connexion.php');
                
         if(!$conn){
             die("connection failed ".mysqli_connect_error());
         }
	$reqselect="select * from vol";

	$resultat=mysqli_query($conn,$reqselect);
	  ?>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>idVol</th>
                                <th>numeroVol</th><br>
                                <th>heureDepart</th>
                               <th>heureArrivee</th>
                                <th>idAeroportDepart</th>
                                <th>idAeroportArrivee</th>
                              <th>idCompagnie</th>-
                                <th>idStatut</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
	while($ligne=mysqli_fetch_assoc($resultat))
	{
	?>
                            <tr>
                                <td><?php echo $ligne['idVol']; ?></td>
                                <td><?php echo $ligne['numeroVol']; ?></td>
                                <td><?php echo $ligne['heureDepart']; ?></td>
                                <td><?php echo $ligne['heureArrivee']; ?></td>
                                <td><?php echo $ligne['idAeroportDepart']; ?></td>
                             <td><?php echo $ligne['idAeroportArrivee']; ?></td>
                             <td><?php echo $ligne['idCompagnie']; ?></td>
                             <td><?php echo $ligne['idStatut']; ?></td>
                                
                                <td><span><a href="modflight.php?mod=<?php echo $ligne['idVol']; ?>"><i class="ri-edit-line edit"></i></a><a href="supdlight.php?supid=<?php echo $ligne['idVol']; ?>"><i class="ri-delete-bin-line delete"></i></a></span></td>
                            </tr><?php }       mysqli_close($conn);?>
                           
                    </table>
	
		
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