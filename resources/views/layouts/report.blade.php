
<section class="classes">
        <div class="classes-description mb-5">
        <h2>Our Records</h2>
        <h3>find most used aerports around the world</h3>
        </div>
        <?php
        $rapports = ["abu", "Bucharest", "damascus", "dubai"]; ?>
        <div class="container">
        <iframe title="rapport" width="1500" height="700" src="https://app.powerbi.com/reportEmbed?reportId=7f1daa42-2dc2-4361-8112-81ad32a0a0c4&autoAuth=true&embeddedDemo=true" frameborder="0" allowFullScreen="true"></iframe>
        <h3 class="mt-3">Edition Mai 2023</h3>
        @foreach($rapports as $airport)
        <div class="card  my-3 p-4 px-2 w-100" style="width:18rem;" >
            <a href=<?php echo "/rapports/rapport-aeroport-".$airport.".pdf"?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                </svg>
                flightsApp , rapport de chiffre de vols passés par l'aeroport <?php echo $airport ?> (MAI 2023) PDF</a>
        </div>
        @endforeach
        </div>
    </section>
