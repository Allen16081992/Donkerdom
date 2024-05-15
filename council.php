<?php 
    require_once './config/session_manager.config.php';
    require_once './models/getdata.model.php';
    verify_UnauthorizedAccess(); // Call the user login definer.
    sessionRegenerateTimer(); // Call the periodic session regenerater.
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' https://use.fontawesome.com; font-src 'self' https://use.fontawesome.com; style-src-attr 'self' https://use.fontawesome.com; upgrade-insecure-requests;">
    <meta name="description" content="Raadkamer van Spellenvereniging het Donkere Heiligdom. Sinds Nov. 2011 actief in games waar D&D in 2020 werd toegevoegd. Sinds 11 Januari 2024 naar het web.">
    <meta name="author" content="">
    <!-- Open Graph meta tags for social sharing -->
    <meta property="og:title" content="Dark Sanctuary Games Association">
    <meta property="og:description" content="De primaire website van vereniging TDS.">
    <meta property="og:image" content="hiligen-logo2.webp">
    <meta property="og:locale" content="nl_NL">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.donkereheiligdom.nl">
    <link rel="canonical" href="https://www.donkereheiligdom.nl/council">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    <!-- Styling Sheets -->
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.2/css/all.css">
    <title>Mijn Raad | Dark Sanctuary</title>
    <!-- Javascript -->
    <script defer src="assets/js/section-handler.js"></script>
    <script defer src="assets/js/profile-handler.js"></script>
    <script defer src="assets/js/table-filter.js"></script>
</head>

<body>
    <header>
        <div class="logo"><a href="#" id="logo"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav>
            <a href="#" class="user-font" data-section="profile"><?= $_SESSION['session_data']['username']; ?></a>
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
                    <h3>Mijn Account</h3>
                    <div class="avatar"></div>

                    <?php $myData = $dm->fetch_MemberInfo($_SESSION['session_data']['user_id']);
                        switch($myData['user_level']) {
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
                        <button id="closeAccount" name="closeAccount">Account Sluiten</button>
                    </form>
                </div>

                <div class="profile-card">
                    <div class="details">
                        <form id="myDetails" action="controllers/submission_handler.control.php" method="post">   
                            <input type="hidden" name="uid" value="<?= $_SESSION['session_data']['user_id']; ?>">
                            <input type="hidden" name="user_level" value="<?= $_SESSION['session_data']['rank']; ?>">

                            <label for="username">Gebruikersnaam</label>
                            <input type="text" id="username" name="username" placeholder="Gebruikersnaam" value="<?= $myData['username']; ?>" disabled>                     
                            <label for="firstname">Naam</label>
                            <input type="text" id="firstname" name="firstname" placeholder="Voornaam" value="<?= $myData['firstname']; ?>" disabled>
                            <label for="lastname">Achternaam</label>
                            <input type="text" id="lastname" name="lastname" placeholder="Achternaam" value="<?= $myData['lastname']; ?>" disabled>
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Email" value="<?= $myData['email']; ?>" disabled>
                            <label for="pwd">Wachtwoord</label>
                            <input type="password" id="pwd" name="pwd" placeholder="*****" disabled> 
                            <button id="editProfile" name="edit">Wijzigen</button>
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
        </section>

        <section id="home" class="current">
            <h2>Stem & Raadkamer</h2>
            <p>De officiële Hoge Raad om te stemmen.</p>
            <div class="container">
                <div class="profile-card">
                    <h4>Huidige Kwestie</h4>
                    <?php if (is_array($item) && isset($item['active']) && $item['active'] == 1) { ?>
                    <strong><?= $item['title'] ?></strong>
                    <p><?= $item['description'] ?></p>
                    <form action="controllers/submission_handler.control.php" class="form-action" method="post">
                        <input type="hidden" name="uid" value="<?= $_SESSION['session_data']['user_id']; ?>">
                        <button class="edit" name="accept">Voor</button>
                        <button class="trash" name="decline">Tegen</button>
                        <button class="create" name="neutral">Neutraal</button>
                    </form> 
                    <?php } else { ?>
                        <p>Geen actief onderwerp om te stemmen.</p>
                    <?php } ?>
                </div>
                <div class="profile-card">
                    <div class="filter-container">
                        <h4>Onderwerpen</h4>
                        <?php if ($_SESSION['session_data']['rank'] >= 3) { ?>
                            <form action="form_handler.php" method="post">
                                <button class="create" name="createItem">Nieuw Item</button>
                            </form>
                        <?php } ?>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titel</th>
                                <th>Beschrijving</th>
                                <th>#</th>
                                <th>Voor</th>
                                <th>Tegen</th>
                                <th>Actie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($subData)) { foreach ($subData as $items): ?>
                                <tr>
                                    <td><?= $items['id']; ?></td>
                                    <td><?= $items['title']; ?></td>
                                    <td><?= $items['description']; ?></td>
                                    <td>
                                        <form action="controllers/submission_handler.control.php" method="post">
                                            <input type="hidden" value="<?= $items['id']; ?>">
                                            <?= ($items['active'] == 1) ? '<button name="offBtn">On</button>' : '<button name="onBtn">Off</button>'; ?>
                                        </form>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form class="form-action" action="form_handler.php" method="post">
                                            <input type="hidden" name="item_id" value="<?= $items['id']; ?>">
                                            <?php if ($items['active'] == 0) { ?>
                                                <button class="edit" name="editItem"><i class="fas fa-eye fa-xs"></i></button>
                                                <button class="trash" name="undoItem"><i class="fas fa-trash-alt"></i></button>
                                            <?php } else { ?>
                                                <button class="unset" disabled><i class="fas fa-eye fa-xs"></i></button>
                                                <button class="unset" disabled><i class="fas fa-trash-alt"></i></button>
                                            <?php } ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; } ?>
                        </tbody>
                    </table>
                </div>
                <div class="profile-card">
                    <h4>Raad 3</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="profile-card">
                    <h4>Raad 4</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </section>
    
        <section id="manage" class="hidden">
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

                    <div class="form-action">
                        <input type="text" id="searchInput"><!-- Maybe a future search bar -->
                        <button id="searchButton"><i class="fas fa-magnifying-glass"></i></button>
                    </div>

                    <?php if ($_SESSION['session_data']['rank'] == 4) { ?>
                        <form action="form_handler.php" method="post">
                            <button class="create" name="createMember">Nieuw Lid</button>
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
                                    <form action="form_handler.php" class="form-action" method="post">
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
                    <!-- This is dynamically generated by javascript -->
                </div>
            </div>
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