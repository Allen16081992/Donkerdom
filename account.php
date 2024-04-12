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
    <title>Account | Dark Sanctuary</title>
</head>

<body>
    <header>
        <div class="logo"><a><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav>
            <a class="current">Mijn Account</a>
            <a href="council.php">Terug</a>
        </nav>
    </header>

    <main>
        <section id="profile">
            <?php require_once './models/getmember.model.php'; ?>
            <h2>Account Wijzigen</h2>
            <div class="form-window">
                <?php switch($myData['user_level']) {
                        case 1:
                            echo "<p>Guest</p>";
                            break;
                        case 2:
                            echo "<p>Member</p>";
                            break;
                        case 3:
                            echo "<p>Council</p>";
                            break;
                        case 4:
                            echo "<p>Admin</p>";
                            break;
                } ?>
                <form action="controllers/submission_handler.control.php" method="post">
                    <?php server_Messenger(); ?>
                    <label for="firstname">Voornaam</label>
                    <input type="text" name="firstname" placeholder="Voornaam" value="<?= $myData['firstname']; ?>">
                    <label for="lastname">Achteraam</label>
                    <input type="text" name="lastname" placeholder="Achternaam" value="<?= $myData['lastname']; ?>">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" placeholder="Gebruikersnaam" value="<?= $myData['username']; ?>">
                    <label for="email">E-mailadres</label>
                    <input type="email" name="email" placeholder="Email" value="<?= $myData['email']; ?>">
                    <label for="pwd">Wachtwoord</label>
                    <input type="password" name="pwd" placeholder="Wachtwoord">     

                    <input type="hidden" name="user_level" value="<?= $_SESSION['session_data']['rank']; ?>">
                    <input type="hidden" name="uid" value="<?= $_SESSION['session_data']['user_id']; ?>">

                    <button type="submit" id="prevBtn" name="editMyself">Opslaan</button>
                    <button type="submit" id="nextBtn" name="close">Account Sluiten</button>
                    <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
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