<?php 
    require_once './config/session_manager.config.php';
    verify_UnauthorizedAccess(); // Call the access authorizer.
    sessionRegenerateTimer(); // Call the timely session regenerator.
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self';">
    <meta name="description" content="Spellenvereniging het Donkere Heiligdom. Sinds Nov. 2011 actief in games waar D&D in 2020 werd toegevoegd. Sinds 11 Januari 2024 naar het web.">
    <meta name="author" content="">
    <!-- Open Graph meta tags for social sharing -->
    <meta property="og:title" content="Dark Sanctuary Games Association">
    <meta property="og:description" content="De primaire website van vereniging TDS.">
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
    <title>Uitloggen | Dark Sanctuary</title>
</head>

<body>
    <header>
        <div class="logo"><a><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav><a href="council.php">Terug</a></nav>
    </header>

    <main>
        <section>
            <?php
                if (isset($_POST['closeAccount'])) {
                    echo '
                        <h2>Weet je zeker dat je jouw account wilt sluiten?</h2>
                        <p>Je account en gegevens worden zorgvuldig uit ons systeem verwijderd.<br>
                        Deze handeling kan niet ongedaan worden gemaakt.</p>
                        <form action="controllers/submission_handler.control.php" method="post">
                            <input type="hidden" name="uid" value="'.$_SESSION['session_data']['user_id'].'">
                            <button type="submit" id="nextBtn" name="shutAcc">Account Sluiten</button>
                        </form>
                    ';
                } else {
                    echo '
                        <h2>Weet je zeker dat je wilt uitloggen?</h2>
                        <form action="" method="post">
                            <button type="submit" id="nextBtn" name="logout">Uitloggen</button>
                        </form>     
                    ';
                }
            ?>
            <!-- The session_manager.config handles the rest -->
        </section>
    </main>
</body>