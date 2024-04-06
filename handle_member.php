<?php // Dhr. Allen Pieter.
    require_once 'config/session_manager.config.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hoofdpagina van Spellenvereniging het Donkere Heiligdom. Sinds Nov. 2011 actief in games waar D&D in 2020 werd toegevoegd. Sinds 11 Januari 2024 naar het web.">
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
    <title>Nieuwe Lid | Dark Sanctuary</title>
</head>

<body>
    <header>
        <!-- <div class="logo"><a href="index.html"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div> -->
        <nav>
            <a href="client.php">Mijn Raad</a>
            <a href="client.php">Terug</a>
        </nav>
    </header>

    <main>
        <!-- User Profile Form -->
        <section id="user">
            <div class="form-window">
                <?php
                    // if statement voor (Admin) Create, Read, Update, Delete requests
                    //////////////////////////////////////////////////////////////////
                    //////////////////////////////////////////////////////////////////
                ?>
                <h2>Een Nieuw Account</h2>
                <form action="controllers/submission_handler.control.php" method="post">
                    <p>Vervang mij</p>
                    <!-- <label for="firstname">Voornaam</label>
                    <input type="text" name="firstname" placeholder="Voornaam" required>

                    <label for="lastname">Achteraam</label>
                    <input type="text" name="lastname" placeholder="Achternaam" required>

                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" placeholder="Gebruikersnaam" required>

                    <label for="email">E-mailadres</label>
                    <input type="email" name="email" placeholder="Email" required>

                    <select id="rankDropdown" name="rank">
                        <option value="default">Rechten</option>
                        <option value="User">Guest</option>
                        <option value="User">Member</option>
                        <option value="User">Council</option>
                        <option value="User">Admin</option>
                    </select> 

                    <button type="submit" name="create">Aanmaken</button>-->
                </form>
            </div>
        </section>
    </main>
</body>
</html>