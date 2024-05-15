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
    <meta property="og:description" content="De primaire website van vereniging TDS voor het beheren van onze ledenadministratie.">
    <meta property="og:image" content="hiligen-logo2.webp">
    <meta property="og:locale" content="nl_NL">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.donkereheiligdom.nl">
    <link rel="canonical" href="https://www.donkereheiligdom.nl/forms">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <!-- Styling Sheets -->
    <link rel="stylesheet" href="assets/css/default.css">
    <title>Wijzigingen | Dark Sanctuary</title>
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
                        <label for="new-firstname">Voornaam</label>
                        <input type="text" id="new-firstname" name="firstname" placeholder="Voornaam" required>
                        <label for="new-lastname">Achteraam</label>
                        <input type="text" id="new-lastname" name="lastname" placeholder="Achternaam" required>
                        <label for="new-username">Gebruikersnaam</label>
                        <input type="text" id="new-username" name="username" placeholder="Gebruikersnaam" required>
                        <label for="new-email">E-mailadres</label>
                        <input type="email" id="new-email" name="email" placeholder="Email" required>
                        <label for="new-pwd">Wachtwoord</label>
                        <input type="password" id="new-pwd" name="pwd" placeholder="Wachtwoord" required>

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

                        <button type="submit" id="nextBtn" name="createMember">Lid Aanmaken</button>
                        <span class="spooky">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Lid Aanpassen -->
                <?php } elseif (isset($_POST['editMember'])) { 
                        require_once './models/getdata.model.php'; 
                        $listedOne = $dm->fetch_MemberInfo($_POST['uid']); 
                    ?>
                    <h2>Een Lid Wijzigen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <label for="edit-firstname">Voornaam</label>
                        <input type="text" id="edit-firstname" name="firstname" placeholder="Voornaam" value="<?= $listedOne['firstname']; ?>">
                        <label for="edit-lastname">Achteraam</label>
                        <input type="text" id="edit-lastname" name="lastname" placeholder="Achternaam" value="<?= $listedOne['lastname']; ?>">
                        <label for="edit-username">Gebruikersnaam</label>
                        <input type="text" id="edit-username" name="username" placeholder="Gebruikersnaam" value="<?= $listedOne['username']; ?>">
                        <label for="edit-email">E-mailadres</label>
                        <input type="email" id="edit-email" name="email" placeholder="Email" value="<?= $listedOne['email']; ?>">
                        <label for="edit-pwd">Wachtwoord</label>
                        <input type="password" id="edit-pwd" name="pwd" placeholder="Vereist*" required>

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

                        <input type="hidden" name="uid" value="<?= $_POST['uid'] ?>">
                        <button type="submit" id="nextBtn" name="editMember">Lid Wijzigen</button>
                        <span class="spooky">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Lid Verwijderen -->
                <?php } elseif (isset($_POST['undoMember'])) { ?>
                    <h2>Lid Verwijderen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <p>Wil je dit lid echt verwijderen?</p>                       
                        
                        <input type="hidden" name="uid" value="<?= $_POST['uid'] ?>">
                        <button type="submit" id="nextBtn" name="undoMember">Lid Verwijderen</button>                   
                        <span class="spooky">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Stem Item Maken -->
                <?php } elseif (isset($_POST['createItem'])) { ?>
                    <h2>Nieuw Onderwerp</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <label for="new-title">Titel</label>
                        <input type="text" id="new-title" name="title" placeholder="Titel">
                        <label for="new-desc">Beschrijving</label>
                        <input type="text" id="new-desc" name="description" placeholder="Beschrijving...">
                        <label for="new-options">(Optioneel: opinies; per komma)</label>
                        <textarea name="options" id="new-options" placeholder="Opties om uit te kiezen..."></textarea>
                        <button type="submit" id="nextBtn" name="createItem">Item Aanmaken</button>
                        <span class="spooky">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Stem Wijzigen -->
                <?php } elseif (isset($_POST['editItem'])) { 
                        require_once './models/getdata.model.php'; 
                        //$listedOne = $dm->fetch_MemberInfo($_POST['uid']); 
                    ?>
                    <h2>Onderwerp Wijzigen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <label for="edit-title">Titel</label>
                        <input type="text" id="edit-title" name="title" placeholder="Titel">
                        <label for="edit-desc">Beschrijving</label>
                        <input type="text" id="edit-desc" name="description" placeholder="Beschrijving...">
                        <label for="edit-options">(Optioneel: opinies; per komma)</label>
                        <textarea id="edit-options" name="options" placeholder="Opties om uit te kiezen..."></textarea>

                        <input type="hidden" name="item_id" value="<?= $_POST['item_id']; ?>">
                        <button type="submit" id="nextBtn" name="createItem">Item Aanmaken</button>
                        <span class="spooky">Nog geen account? maak er hier eentje aan</span>
                    </form>

                <!-- Een Stem Verwijderen -->
                <?php } elseif (isset($_POST['undoItem'])) { ?>
                    <h2>Onderwerp Verwijderen</h2>
                    <form action="controllers/submission_handler.control.php" method="post">
                        <p>Wil je dit onderwerp echt verwijderen?</p>

                        <input type="hidden" name="item_id" value="<?= $_POST['item_id']; ?>">
                        <button type="submit" id="nextBtn" name="undoItem">Verwijderen</button>
                        <span class="spooky">Nog geen account? maak er hier eentje aan</span>
                    </form>
                <?php } ?>
            </div>
        </section>
    </main>
</body>
</html>