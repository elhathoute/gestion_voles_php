<?php
$api_key = "fe5a92536da500da37555af0a42d6b68"; // Remplacez par votre clé API AviationStack

// Endpoint pour récupérer les vols
$endpoint = "http://api.aviationstack.com/v1/flights";

// Paramètres de la requête
$params = array(
    'access_key' => $api_key,
    'limit' => 1 // Nombre de vols à récupérer (dans cet exemple, nous récupérons 1 vol)
);

// Création de l'URL de la requête
$url = $endpoint . '?' . http_build_query($params);

// Envoi de la requête et récupération de la réponse
$response = file_get_contents($url);

// Vérification de la réponse
if ($response) {
    // Décodage de la réponse JSON en tableau associatif
    $data = json_decode($response, true);

    // Vérification si des vols ont été trouvés
    if ($data['pagination']['total'] > 0) {
        // Récupération du numéro de vol du premier vol trouvé
        $flight = $data['data'][0];
        $flight_number = $flight['flight']['number'];

        // Affichage du numéro de vol
        echo "Numéro de vol : " . $flight_number;
    } else {
        echo "Aucun vol trouvé.";
    }
} else {
    echo "Erreur lors de la requête à l'API AviationStack.";
}
?>