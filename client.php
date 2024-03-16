<?php // Dhr. Allen Pieter
    require_once './config/session_manager.config.php';
    //verify_UnauthorizedAccess(); // Call the user login definer.
    //sessionRegenerateTimer(); // Call the periodic session regenerater.
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina dat getoond wordt na het inloggen. Spellenvereniging het Donkere Heiligdom.">
    <meta name="author" content="">
    <!-- Open Graph meta tags for social sharing -->
    <meta property="og:title" content="Dark Sanctuary Games Association">
    <meta property="og:description" content="De primaire website van vereniging TDS voor het beheren van onze ledenadministratie.">
    <meta property="og:image" content="hiligen-logo2.webp">
    <meta property="og:locale" content="nl_NL" />
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://www.donkereheiligdom.nl">
    <link rel="canonical" href="https://www.donkereheiligdom.nl">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <!-- Styling Sheets -->
    <link rel="stylesheet" href="assets/css/default.css">
    <title>Mijn Raad | Dark Sanctuary</title>
    <script defer src="assets/js/section-handler.js"></script>
</head>

<body>
    <header>
        <div class="logo"><a id="home"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav>
            <a data-section="home" class="current">Mijn Raad</a> 
            <a href="controllers/logout.control.php" id="logout">Uitloggen</a>
        </nav>
    </header>

    <main>
        <!-- council is named 'home' here -->
        <section id="home" class="current">
            <h2>Mijn Raad</h2>
            <p>Empty</p>
        </section>

        <section id="error404" class="hidden">
            <h2>Error 404</h2>
            <p>Zo te zien ben je op een pagina geland welke nog niet bestaat, of onlangs is verwijderd.</p>
        </section>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <div>
                <p>Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>Hierdoor kunt u waarschijnlijk geen gebruik maken van de website.</p>
            </div>
        </noscript> 
    </main>
</body>
</html>