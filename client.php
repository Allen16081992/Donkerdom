<?php // Dhr. Allen Pieter
    require_once './config/session_manager.config.php';
    //verify_UnauthorizedAccess(); // Call the user login definer.
    //sessionRegenerateTimer(); // Call the periodic session regenerater.
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina dat getoond wordt na het inloggen. Spellenvereniging het Donkere Heiligdom.">
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
        <!--<div class="logo"><a id="home"><img src="assets/images/hiligen-logo2.webp" alt="Games Association Logo"></a></div>-->
        <nav>
            <a data-section="home" class="current">Mijn Raad</a> 
            <a href="./logout.php" id="logout">Uitloggen</a>
        </nav>
    </header>

    <main>
        <!-- council is named 'home' here -->
        <section id="home">
            <h2>User Profile Management</h2>
            <!-- User Table -->
            <div class="container">
                <div class="search-container">
                    <input type="text" placeholder="Search...">
                    <form action="handle_member.php" method="post">
                        <button class="filter-btn" name="createMember">Create</button>
                    </form>
                    <select id="filterDropdown">
                        <option>Filter</option>
                        <option value="category1">Admin</option>
                        <option value="category2">Council</option>
                        <option value="category3">Member</option>
                        <option value="category3">Guest</option>
                        <option value="category3">Date</option>
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
                        <tr>
                            <td>1</td>
                            <td>john_doe</td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>Admin</td>
                            <td>
                                <form action="handle_member.php" method="post">
                                    <button class="edit" name="editMember"><i class="fas fa-edit"></i></button>  
                                    <button class="trash" name="undoMember"><i class="fas fa-trash-alt"></i></button>
                                </form> 
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- User Profile Form -->
            <!-- <h2>Create Member</h2>
            <div class="form-window">
                <form action="#" method="post">
                    <label for="firstname">Voornaam</label>
                    <input type="text" name="firstname" placeholder="Voornaam" required>

                    <label for="lastname">Achteraam</label>
                    <input type="text" name="lastname" placeholder="Achternaam" required>

                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" placeholder="Gebruikersnaam" required>

                    <label for="email">E-mailadres</label>
                    <input type="email" id="email" name="email" required>

                    <label for="role">Lid Niveau</label>
                    <select id="role" name="role" required>
                        <option value="Admin">Admin</option>
                        <option value="User">Council</option>
                        <option value="User">Member</option>
                        <option value="User">Guest</option>
                    </select>

                    <button type="submit" name="create">Aanmaken</button>
                </form>
            </div> -->
        </section>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <p>Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>Hierdoor kunt u waarschijnlijk geen gebruik maken van de website.</p>
        </noscript> 
    </main>
</body>
</html>