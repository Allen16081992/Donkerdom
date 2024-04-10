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
</head>

<body>
    <header>
        <div class="logo"><a href="#" id="logo"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>
        <nav>
            <a href="#" data-section="manage">Management</a>
            <a href="#" data-section="myplace">Account</a>
            <a href="./logout.php" id="logout">Uitloggen</a>
        </nav>
    </header>

    <main>
        <section id="home" class="current">
            <h2>Mijn Raad</h2>
            <p>De officiële Hoge Raad om te stemmen.</p>
        </section>
    
        <section id="manage" class="hidden">
            <?php require_once './models/getdata.model.php'; ?>
            <h2>Leden Management</h2>
            <div class="container">
                <div class="search-container">
                    <input type="text" placeholder="Search...">
                    <form action="member.php" method="post">
                        <button class="filter-btn" name="createMember">Create</button>
                    </form>

                    <select id="filterDropdown">
                        <option>Filter</option>
                        <option value="admin">Admin</option>
                        <option value="council">Council</option>
                        <option value="member">Member</option>
                        <option value="guest">Guest</option>
                        <option value="date">Date</option>
                    </select>
                </div>

                <table>
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
                        <?php if (!empty($acData)) { ?>
                        <?php foreach ($acData as $userData): ?>
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
                        <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="myplace" class="hidden">
            <h2>Mijn Account</h2>

        </section>

        <section id="error404" class="hidden">
            <h2>Error 404</h2>
            <p>Zo te zien ben je op een pagina geland welke nog niet bestaat, of onlangs is verwijderd.</p>
        </section>

        <footer>
            
        </footer>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <p class="error-msg">Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>De knoppen onder onze vleermuis zijn daardoor uitgeschakeld.</p>
        </noscript> 
    </main>
</body>
</html>