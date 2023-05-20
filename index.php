<?php
// Connect to the database and insert the data
include('connexion.php');

// Check if the form has been submitted
if (isset($_POST['Sign_Up'])) {
    // Get the values from the form fields
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    // Perform additional validations if needed
    // ...

    // Check if the database connection is successful
    if (!$conn) {
        die("Failed to connect to the database: " . mysqli_connect_error());
    }

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM client WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        echo "This email is already registered. Please use a different email.";
    } else {
        // Prepare the insert query
        $insert_query = "INSERT INTO client (nom, prenom, email, motDePasse) VALUES ('$nom', '$prenom', '$email', '$password')";

        // Execute the insert query
        if (mysqli_query($conn, $insert_query)) {
            // Registration successful. Redirect to flights page
            header('location: searchflights.php');
            exit();
        } else {
            echo "Error during registration: " . mysqli_error($conn);
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!--connexion-->
<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Utilisateur déjà connecté, rediriger vers la page de recherche
    header("Location: searchflights.php");
    exit;
}

// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['Sign_In'])) {
    // Récupérer les valeurs des champs du formulaire
    $email = $_POST['email'];
    $password = $_POST['pswd'];

    // Se connecter à la base de données
    include('connexion.php');

    // Vérifier si la connexion à la base de données est réussie
    if (!$conn) {
        die("Échec de la connexion à la base de données: " . mysqli_connect_error());
    }

    // Vérifier les informations de connexion du client
    $check_credentials_query = "SELECT * FROM client WHERE email = '$email' AND motDePasse = '$password'";
    $check_credentials_result = mysqli_query($conn, $check_credentials_query);

    if (mysqli_num_rows($check_credentials_result) > 0) {
        // Connexion réussie
        // Définir la session de l'utilisateur
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

        // Redirection vers la page de recherche
        header("Location: searchflights.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }

    // Fermer la connexion à la base de données
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
       <!--  <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search Scdule..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
           <div class="notification--profile">-->
             <!--   <div class="picon lock">
                    <i class="ri-lock-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>-->
             <!--  <div class="picon profile">
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
                        <span class="sidebar--item">Administrator </span>
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
           <!--     <li>
                    <a href="searchflights.php">
                        <span class="icon icon-5"><i class="ri-flight-takeoff-line"></i></span>
                        <span class="sidebar--item"> Flights</span>
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
 <!--login-->

            <div class="container" id="main">
        <div class="sign-up">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <!--   <h1>Create Account</h1>
              <div class="social-container">
                    <a href="#" class="social"><i class="ri-facebook-line"></i></a>
                    <a href="#" class="social"><i class="ri-google-line"></i></a>
                    <a href="#" class="social"><i class="ri-linkedin-line"></i></a>
                </div>-->
                <h1>use your email for registration</h1>
                <input type="text" name="nom" placeholder="Votre Nom" required="">
                <input type="text" name="prenom" placeholder="Votre Prenom" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Mot de passe" required="">
                <input type="submit" value="Sign Up" name="Sign_Up" class="button">
               <!--<button class="button">Sign up</button>--> 
            </form>
        </div>

        <div class="sign-in">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <!--<h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="ri-facebook-line"></i></a>
                    <a href="#" class="social"><i class="ri-google-line"></i></a>
                    <a href="#" class="social"><i class="ri-linkedin-line"></i></a>
                </div>-->
                <h1>use your account </h1>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Mot de passe" required="">
                <a href="ForgetPwd.php">Forget your Password</a>
                <input type="submit" value="Sign In" name="Sign_In"  class="button">
             <!--  <button class="button">Sign In</button>--> 
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <h1>Welecome Back!</h1>
                    <p>TO keep connected with us please login with your personal info</p>
                    <button id="signIn" class="button">Sign In</button>
                </div>
                <div class="overlay-right">
                    <h1>Hello, Friend</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button id="signUp" class="button">Sign Up</button>
                </div>
            </div>
        </div> 
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

    <!--  login script-->
      <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const main = document.getElementById('main');

        signUpButton.addEventListener('click',()=>{
            main.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click',()=>{
            main.classList.remove("right-panel-active");
        });
    </script>             
</body>
</html>

