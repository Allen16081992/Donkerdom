<?php 
    require_once 'config/session_manager.config.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; upgrade-insecure-requests;">
    <meta name="description" content="Hoofdpagina van Spellenvereniging het Donkere Heiligdom. Sinds Nov. 2011 actief in games waar D&D in 2020 werd toegevoegd. Sinds 11 Januari 2024 naar het web.">
    <meta name="author" content="">
    <!-- Open Graph meta tags for social sharing -->
    <meta property="og:title" content="Dark Sanctuary Games Association">
    <meta property="og:description" content="De primaire website van vereniging TDS.">
    <meta property="og:image" content="hiligen-logo2.webp">
    <meta property="og:locale" content="nl_NL">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.donkereheiligdom.nl">
    <link rel="canonical" href="https://www.donkereheiligdom.nl/login">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <!-- Styling Sheets -->
    <link rel="stylesheet" href="assets/css/default.css">
    <title>Login | Het Donkere Heiligdom</title>
    <!-- Javascript -->
    <script defer src="assets/js/section-handler.js"></script>
</head>

<body>
    <header>
        <div class="logo"><a href="index.html"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav>
            <a href="#" class="current">Mijn Raad</a>
            <a href="index.html">Terug</a>
        </nav>
    </header>

    <main>
        <?php server_Messenger(); ?>
        <section id="login">
            <div class="form-window">
                <h2>Inloggen</h2>
                <form action="controllers/submission_handler.control.php" method="post">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
                    <label for="pwd">Wachtwoord</label>
                    <input type="password" id="pwd" name="pwd" placeholder="Wachtwoord" required>

                    <button type="submit" name="login">Inloggen</button>
                    <span>Nog geen account? <a href="signup.php">maak er hier eentje aan</a></span>
                </form>
            </div>
        </section>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <p class="error-msg">Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>De knoppen onder onze vleermuis werken hierdoor niet meer.</p>
        </noscript>
    </main>
</body>
</html>