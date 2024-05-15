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
    <link rel="canonical" href="https://www.donkereheiligdom.nl/signup">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <!-- Styling Sheets -->
    <link rel="stylesheet" href="assets/css/default.css">
    <title>Een Nieuw Account | Het Donkere Heiligdom</title>
    <!-- Javascript -->
    <script defer src="assets/js/form.multi-step.js"></script>
    <script defer src="assets/js/section-handler.js"></script>
</head>

<body>
    <header>
        <div class="logo"><a href="index.html" id="home"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav>
            <a href="#" class="current">Mijn Raad</a>
            <a href="index.html">Terug</a>
        </nav>
    </header>

    <main>
        <?php server_Messenger(); ?>
        <section class="current">
            <div class="form-window">
                <h2>Een Nieuw Account</h2>
                <form action="controllers/submission_handler.control.php" method="post">
                    <div class="lightbulbs">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <div class="tab">
                        <label for="firstname">Voornaam</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Voornaam" required>
                        <label for="lastname">Achteraam</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Achternaam" required>
                    </div>

                    <div class="tab">
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
                        <label for="email">E-mailadres</label> 
                        <input type="text" id="email" name="email" placeholder="E-mailadres" required>
                    </div>

                    <div class="tab">
                        <label for="pwd">Wachtwoord</label>
                        <input type="password" id="pwd" name="pwd" placeholder="Wachtwoord" required>
                        <label for="pwdR">Herhaal Wachtwoord</label>
                        <input type="password" id="pwdR" name="pwdR" placeholder="Herhaal Wachtwoord" required>
                        <label for="terms"></label>
                        <span><input type="checkbox" id="terms" name="terms" required> Lees en accepteer de <a href="terms-and-conditions.php" target="_blank">algemene voorwaarden</a>.</span>
                    </div>

                    <div class="rotator">
                        <button type="submit" id="prevBtn">Terug</button>
                        <button type="submit" id="nextBtn">Verder</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <p class="error-msg">Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>De knoppen onder onze vleermuis werken hierdoor niet meer.</p>
            <section class="current">
                <div class="form-window">
                    <h2>Een Nieuw Account</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <div class="lightbulbs"></div>
                        <?php
                            if (isset($_SESSION['error'])) {
                                echo '<div class="error-msg">'.$_SESSION['error'].'</div>';
                                $_SESSION['error'] = null; // Clear the server message on page reload
                            }
                            if (isset($_SESSION['success'])) {
                                echo '<div class="success-msg">'.$_SESSION['success'].'</div>';
                                $_SESSION['success'] = null; // Clear the server message on page reload
                            }
                        ?>
                        <label for="signup-firstname">Voornaam</label>
                        <input type="text" id="signup-firstname" name="firstname" placeholder="Voornaam" required>
                        <label for="signup-lastname">Achteraam</label>
                        <input type="text" id="signup-lastname" name="lastname" placeholder="Achternaam" required>

                        <label for="signup-username">Gebruikersnaam</label>
                        <input type="text" id="signup-username" name="username" placeholder="Gebruikersnaam" required>
                        <label for="signup-email">E-mailadres</label> 
                        <input type="text" id="signup-email" name="email" placeholder="E-mailadres" required>

                        <label for="signup-pwd">Wachtwoord</label>
                        <input type="password" id="signup-pwd" name="pwd" placeholder="Wachtwoord" required>
                        <label for="signup-pwdR">Herhaal Wachtwoord</label>
                        <input type="password" id="signup-pwdR" name="pwdR" placeholder="Herhaal Wachtwoord" required>
                        <label for="signup-terms"></label>
                        <span><input type="checkbox" id="signup-terms" name="terms" required> Lees en accepteer de <a href="terms-and-conditions.php" target="_blank">algemene voorwaarden</a>.</span>

                        <button type="submit" id="nextBtn" name="signup">Aanmelden</button>          
                    </form>
                </div>
            </section>
        </noscript> 
    </main>
</body>
</html>