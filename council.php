<?php // Dhr. Allen Pieter
    require_once './config/session_manager.config.php';
    verify_UnauthorizedAccess(); // Call the user login definer.
    sessionRegenerateTimer(); // Call the periodic session regenerater.
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Raadkamer van Spellenvereniging het Donkere Heiligdom. Sinds Nov. 2011 actief in games waar D&D in 2020 werd toegevoegd. Sinds 11 Januari 2024 naar het web.">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Mijn Raad | Dark Sanctuary</title>
    <script defer src="assets/js/section-handler.js"></script>
    <script defer src="assets/js/profile-handler.js"></script>
</head>

<body>
    <header>
        <div class="logo"><a href="#" id="logo"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav>
            <a href="#" data-section="profile" style="font-style:italic;"><?= $_SESSION['session_data']['username']; ?></a>
            <a href="#" data-section="home">Raad</a>
            <a href="#" data-section="manage">Management</a>
            <a href="./logout.php" id="logout">Uitloggen</a>
        </nav>
    </header>

    <main>
        <?php server_Messenger(); ?>
        <section id="profile" class="hidden">
            <div class="container">
                <div class="profile-card">
                    <!-- Placeholder for avatar -->
                    <div class="avatar"></div>
                    <?php require_once './models/getmember.model.php'; ?>
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
                    <strong><?= $myData['firstname'].' '.$myData['lastname']; ?></strong>
                    <p>Full Stack Developer</p>
                    <form action="logout.php" method="post">
                        <button id="closeAccount" style="background:grey;" name="closeAccount">Account Sluiten</button>
                    </form>
                    <span style="opacity:0;">Nog geen account? maak er hier eentje aan aan aan aan aan aann</span>
                </div>

                <div class="profile-card">
                    <div class="details">
                        <form id="myDetails" action="controllers/submission_handler.control.php" method="post"> 
                        <label for="username">Gebruikersnaam</label>
                            <input type="hidden" name="uid" value="<?= $_SESSION['session_data']['user_id']; ?>">
                            <input type="hidden" name="user_level" value="<?= $_SESSION['session_data']['rank']; ?>">

                            <input type="text" name="username" placeholder="Gebruikersnaam" value="<?= $myData['username']; ?>" disabled>                     
                            <label for="firstname">Naam</label>
                            <input type="text" name="firstname" placeholder="Voornaam" value="<?= $myData['firstname']; ?>" disabled>
                            <label for="lastname">Achternaam</label>
                            <input type="text" name="lastname" placeholder="Achternaam" value="<?= $myData['lastname']; ?>" disabled>
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="Email" value="<?= $myData['email']; ?>" disabled>
                            <label for="pwd">Wachtwoord</label>
                            <input type="password" name="pwd" placeholder="*****" disabled> 
                            <button id="editButton" name="edit">Wijzigen</button>
                        </form>
                    </div>
                </div>

                <div class="profile-card">
                    <h4>Profile 3</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

                <div class="profile-card">
                    <h4>Profile 4</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            
            <!-- <h2>Account Wijzigen</h2>
            <div class="form-window">
                <form action="controllers/submission_handler.control.php" method="post">
                    <label for="firstname">Voornaam</label>
                    <input type="text" name="firstname" placeholder="Voornaam" >
                    <label for="lastname">Achteraam</label>
                    <input type="text" name="lastname" placeholder="Achternaam" >
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" placeholder="Gebruikersnaam" >
                    <label for="email">E-mailadres</label>
                    <input type="email" name="email" placeholder="Email" >
                    <label for="pwd">Wachtwoord</label>
                    <input type="password" name="pwd" placeholder="Wachtwoord">     

                    <input type="hidden" name="user_level" >
                    <input type="hidden" name="uid" >

                    <button type="submit" id="prevBtn" name="editMyself">Opslaan</button>
                    <a href="account.php">Account Sluiten</a>
                    <span style="opacity:0;">Nog geen account? maak er hier eentje aan</span>
                </form>
            </div> -->
        </section>

        <section id="home" class="current">
            <h2>Raadkamer</h2>
            <p>De officiële Hoge Raad om te stemmen.</p>
        </section>
    
        <section id="manage" class="hidden">
            <?php require_once './models/getdata.model.php'; ?>
            <h2>Leden Lijst</h2>
            <div class="table-container">
                <div class="filter-container">
                    <select id="filterDropdown">
                        <option value="all" selected>Show All</option>
                        <option value="1">Guest</option>
                        <option value="2">Member</option>
                        <option value="3">Council</option>
                        <option value="4">Admin</option>
                    </select>

                    <input type="text" disabled><!-- Maybe a future search bar -->

                    <?php if ($_SESSION['session_data']['rank'] == 4) { ?>
                        <form action="member.php" method="post">
                            <button class="filter-btn" name="createMember">Create</button>
                        </form>
                    <?php } ?>
                </div>

                <table id="userDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gebruiker</th>
                            <th>Naam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Rechten</th>
                            <th>Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($_SESSION['session_data']['rank'] == 4) { ?>
                        <?php if (!empty($acData)) { foreach ($acData as $userData): ?>
                            <tr>
                                <td><?= $userData['userID']; ?></td>
                                <td><?= $userData['username']; ?></td>
                                <td><?= $userData['firstname']; ?></td>
                                <td><?= $userData['lastname']; ?></td>
                                <td><?= $userData['email']; ?></td>
                                <td><?php 
                                    switch($userData['user_level']) {
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
                                    }
                                ?></td>
                                <td>
                                    <form action="member.php" method="post">
                                        <input type="hidden" name="uid" value="<?= $userData['userID']; ?>">
                                        <button class="edit" name="editMember"><i class="fas fa-edit"></i></button>
                                        <button class="trash" name="undoMember"><i class="fas fa-trash-alt"></i></button>
                                    </form> 
                                </td>
                            </tr>
                        <?php endforeach; } ?>
                    <?php } else { ?>
                        <?php if (!empty($acData)) { foreach ($acData as $userData): ?>
                            <tr>
                                <td><?= $userData['userID']; ?></td>
                                <td><?= $userData['username']; ?></td>
                                <td><?= $userData['firstname']; ?></td>
                                <td><?= $userData['lastname']; ?></td>
                                <td><?= $userData['email']; ?></td>
                                <td><?php 
                                    switch($userData['user_level']) {
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
                                    }
                                ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; } ?>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <!-- Placeholder for dynamically generated pagination links -->
                </div>
            </div>
            <script defer src="assets/js/table-filter.js"></script>
        </section>

        <section id="error404" class="hidden">
            <h2>Error 404</h2>
            <p>Zo te zien ben je op een pagina geland welke nog niet bestaat, of onlangs is verwijderd.</p>
        </section>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <p class="error-msg">Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>De knoppen onder onze vleermuis zijn daardoor uitgeschakeld.</p>
        </noscript> 
    </main>
</body>
</html>