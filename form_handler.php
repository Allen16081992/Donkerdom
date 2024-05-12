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
        <!-- <div class="logo"><a href="council.php"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div> -->
        <nav>
            <a href="council.php">Mijn Raad</a>
            <a href="council.php">Terug</a>
        </nav>
    </header>

    <main>
        <?php server_Messenger(); ?>
        <!-- User Profile Form -->
        <section id="user">
            <div class="form-window">
                <!-- (Admin) Een Nieuwe Lid Maken -->
                <?php if (isset($_POST['createMember'])) { ?>
                    <h2>Een Nieuw Lid</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <label for="firstname">Voornaam</label>
                        <input type="text" name="firstname" placeholder="Voornaam" required>
                        <label for="lastname">Achteraam</label>
                        <input type="text" name="lastname" placeholder="Achternaam" required>
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" name="username" placeholder="Gebruikersnaam" required>
                        <label for="email">E-mailadres</label>
                        <input type="email" name="email" placeholder="Email" required>
                        <label for="pwd">Wachtwoord</label>
                        <input type="password" name="pwd" placeholder="Wachtwoord" required>

                        <!-- Only for Admin/Council -->
                        <?php if ($_SESSION['session_data']['rank'] > 2) { ?>
                        <select id="rankDropdown" name="user_level">
                            <option selected>Rechten</option>
                            <option value="1">Guest</option>
                            <option value="2">Member</option>
                            <option value="3">Council</option>
                            <option value="4">Admin</option>
                        </select>
                        <?php } ?>
                        <!---------------------------->

                        <button type="submit" id="nextBtn" name="createMember">Lid Aanmaken</button>
                        <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Lid Aanpassen -->
                <?php } elseif (isset($_POST['editMember'])) { 
                        require_once './models/getdata.model.php'; 
                        $listedOne = $dm->fetch_MemberInfo($_POST['uid']); 
                    ?>
                    <h2>Een Lid Wijzigen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <label for="firstname">Voornaam</label>
                        <input type="text" name="firstname" placeholder="Voornaam" value="<?= $listedOne['firstname']; ?>">
                        <label for="lastname">Achteraam</label>
                        <input type="text" name="lastname" placeholder="Achternaam" value="<?= $listedOne['lastname']; ?>">
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" name="username" placeholder="Gebruikersnaam" value="<?= $listedOne['username']; ?>">
                        <label for="email">E-mailadres</label>
                        <input type="email" name="email" placeholder="Email" value="<?= $listedOne['email']; ?>">
                        <label for="pwd">Wachtwoord</label>
                        <input type="password" name="pwd" placeholder="Vereist*" required>

                        <!-- Only for Admin/Council -->
                        <?php if ($_SESSION['session_data']['rank'] > 2) { ?>
                        <select id="rankDropdown" name="user_level">
                            <option value="<?= $listedOne['user_level']; ?>" selected>
                            <?php 
                                switch($listedOne['user_level']) {
                                    case 1:
                                        echo "Guest";
                                        break;
                                    case 2:
                                        echo "Member";
                                        break;
                                    case 3:
                                        echo "Council";
                                        break;
                                    case 4:
                                        echo "Admin";
                                        break;
                            } ?>
                            </option>
                            <option>Rechten</option>
                            <option value="1">Guest</option>
                            <option value="2">Member</option>
                            <option value="3">Council</option>
                            <option value="4">Admin</option>
                        </select>
                        <?php } ?>
                        <!---------------------------->

                        <input type="hidden" name="uid" value="<?= $_POST['uid'] ?>">
                        <button type="submit" id="nextBtn" name="editMember">Lid Wijzigen</button>
                        <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Lid Verwijderen -->
                <?php } elseif (isset($_POST['undoMember'])) { ?>
                    <h2>Lid Verwijderen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <p>Wil je dit lid echt verwijderen?</p>                       
                        
                        <input type="hidden" name="uid" value="<?= $_POST['uid'] ?>">
                        <button type="submit" id="nextBtn" name="undoMember">Lid Verwijderen</button>                   
                        <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Stem Item Maken -->
                <?php } elseif (isset($_POST['createItem'])) { ?>
                    <h2>Nieuw Onderwerp</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <label for="title">Titel</label>
                        <input type="text" name="title" placeholder="Titel">
                        <label for="description">Beschrijving</label>
                        <input type="text" name="description" placeholder="Beschrijving...">
                        <label for="options">(Optioneel: opinies; per komma)</label>
                        <textarea name="options" placeholder="Opties om uit te kiezen..."></textarea>
                        <button type="submit" id="nextBtn" name="createItem">Item Aanmaken</button>
                        <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Stem Wijzigen -->
                <?php } elseif (isset($_POST['editItem'])) { 
                        require_once './models/getdata.model.php'; 
                        //$listedOne = $dm->fetch_MemberInfo($_POST['uid']); 
                    ?>
                    <h2>Onderwerp Wijzigen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <label for="title">Titel</label>
                        <input type="text" name="title" placeholder="Titel">
                        <label for="description">Beschrijving</label>
                        <input type="text" name="description" placeholder="Beschrijving...">
                        <label for="options">(Optioneel: opinies; per komma)</label>
                        <textarea name="options" placeholder="Opties om uit te kiezen..."></textarea>

                        <input type="hidden" name="item_id" value="<?= $_POST['item_id']; ?>">
                        <button type="submit" id="nextBtn" name="createItem">Item Aanmaken</button>
                        <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Stem Verwijderen -->
                <?php } elseif (isset($_POST['undoItem'])) { ?>
                    <h2>Onderwerp Verwijderen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <p>Wil je dit onderwerp echt verwijderen?</p>

                        <input type="hidden" name="item_id" value="<?= $_POST['item_id']; ?>">
                        <button type="submit" id="nextBtn" name="undoItem">Verwijderen</button>
                        <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
                    </form>
                <?php } ?>
            </div>
        </section>
    </main>
</body>
</html>