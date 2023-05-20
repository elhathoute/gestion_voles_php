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
            
            
            <div class="container">
<br><br><form method="POST" action=""><br><br><br>
<h1 class="h1">Reset Password:</h1><br><br><br>

    <input type="email" name="email" placeholder="Adresse e-mail" required><br><br>

    <input type="submit" value="Reset Password" name="reset_password" class="button">

</form>
<?php
// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $password .= $characters[$index];
    }

    return $password;
}

// Check if the email address exists in the database
include('connexion.php');

if (isset($_POST['reset_password'])) {
    // Get the email address from the form
    $email = $_POST['email'];

    // Check if the database connection is successful
    if (!$conn) {
        die("Failed to connect to the database: " . mysqli_connect_error());
    }

    // Check if the email address exists in the client table
    $check_email_query = "SELECT * FROM client WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    // Check the number of returned rows
    if (mysqli_num_rows($check_email_result) > 0) {
        // Generate a new random password
        $new_password = generateRandomPassword();

        // Update the password in the database
        $update_password_query = "UPDATE client SET motDePasse = '$new_password' WHERE email = '$email'";
        $update_password_result = mysqli_query($conn, $update_password_query);

        if ($update_password_result) {
            // Send the new password to the user's email address
            $subject = "Password Reset";
            $message = "Your new password is: $new_password";

            // Use the mail() function or a mailing library to send the email
            $headers = "From: your_email@example.com"; // Remplacez par votre adresse e-mail

            if (mail($email, $subject, $message, $headers)) {
                echo "A new password has been sent to your email address.";
            } else {
                echo "Error sending the email. Please try again.";
            }
        } else {
            echo "Error resetting the password: " . mysqli_error($conn);
        }
    } else {
        echo "This email address is not registered. Please check your input.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


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

