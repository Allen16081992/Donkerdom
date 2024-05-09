<?php
    require_once 'config/session_manager.config.php';
    //$_SESSION['error'] = "Our servers are down for maintenance.<br> Please contact the administrator."; 
    //unset($_SESSION['success']); 
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
    <title>Signup | Dark Sanctuary</title>
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
        <section id="signup" class="current">
            <div class="form-window">
                <h2>Een Nieuw Account</h2>
                <form action="controllers/submission_handler.control.php" method="post">
                    <div style="text-align:center;margin-top:10px; cursor:default;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <div class="tab">
                        <label for="firstname">Voornaam</label>
                        <input type="text" name="firstname" placeholder="Voornaam" required>
                        <label for="lastname">Achteraam</label>
                        <input type="text" name="lastname" placeholder="Achternaam" required>
                    </div>

                    <div class="tab">
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" name="username" placeholder="Gebruikersnaam" required>
                        <label for="email">E-mailadres</label> 
                        <input type="text" name="email" placeholder="E-mailadres" required>
                    </div>

                    <div class="tab">
                        <label for="pwd">Wachtwoord</label>
                        <input type="password" name="pwd" placeholder="Wachtwoord" required>
                        <label for="pwd">Herhaal Wachtwoord</label>
                        <input type="password" name="pwdR" placeholder="Herhaal Wachtwoord" required>
                        <label for="terms"></label>
                        <span><input type="checkbox" title="terms" name="terms" required> Lees en accepteer de <a href="terms-and-conditions.php" target="_blank">algemene voorwaarden</a>.</span>
                    </div>

                    <div class="rotator">
                        <button type="submit" id="prevBtn" onclick="nextPrev(-1)">Terug</button>
                        <button type="submit" id="nextBtn" onclick="nextPrev(1)">Verder</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <p class="error-msg">Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>De knoppen onder onze vleermuis werken hierdoor niet meer.</p>
            <section id="signup" class="current">
                <div class="form-window">
                    <h2>Een Nieuw Account</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <div style="text-align:center;margin-top:10px; cursor:default;"></div>
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
                        <label for="firstname">Voornaam</label>
                        <input type="text" name="firstname" placeholder="Voornaam" required>
                        <label for="lastname">Achteraam</label>
                        <input type="text" name="lastname" placeholder="Achternaam" required>

                        <label for="username">Gebruikersnaam</label>
                        <input type="text" name="username" placeholder="Gebruikersnaam" required>
                        <label for="email">E-mailadres</label> 
                        <input type="text" name="email" placeholder="E-mailadres" required>

                        <label for="pwd">Wachtwoord</label>
                        <input type="password" name="pwd" placeholder="Wachtwoord" required>
                        <label for="pwd">Herhaal Wachtwoord</label>
                        <input type="password" name="pwdR" placeholder="Herhaal Wachtwoord" required>
                        <label for="terms"></label>
                        <span><input type="checkbox" title="terms" name="terms" required> Lees en accepteer de <a href="terms-and-conditions.php" target="_blank">algemene voorwaarden</a>.</span>

                        <button type="submit" id="nextBtn" name="signup">Aanmelden</button>          
                    </form>
                </div>
            </section>
        </noscript> 
    </main>
</body>
</html>