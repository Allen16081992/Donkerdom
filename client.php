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
    <!--<script defer src="assets/js/section-handler.js"></script>-->
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
            <div class="table-container">
                <a href="#" class="create-contact">Create Member</a>
                <form id="searchForm">
                    <label for="search"></label>
                    <input type="text" id="search" name="search" placeholder="Enter keyword...">
                    <input type="submit" value="Search">
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>john_doe</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Admin</td>
                            <td class="actions">
                                <a href="update.php?id=" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                                <a href="delete.php?id=" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>jane_smith</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>User</td>
                            <td class="actions">
                                <a href="update.php?id=" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                                <a href="delete.php?id=" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>nikita_kuznetsov</td>
                            <td>Nikita Kuznetsov</td>
                            <td>nikita@example.com</td>
                            <td>Guest</td>
                            <td class="actions">
                                <a href="update.php?id=" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                                <a href="delete.php?id=" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                            </td>
                        </tr>
                        <!-- Add more rows here if needed -->
                    </tbody>
                </table>
                <div class="pagination">
                    <a href="read.php?page="><i class="fas fa-angle-double-left fa-sm"></i></a>
                    <a href="read.php?page="><i class="fas fa-angle-double-right fa-sm"></i></a>
                </div>
            </div>

            <!-- User Profile Form -->
            <h2>Create Member</h2>
            <div class="form-window">
                <form action="#" method="post">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" id="username" name="username" required>

                    <label for="name">Volledige Naam</label>
                    <input type="text" id="name" name="name" required>

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
            </div>
        </section>

        <!-- Wie JS heeft uitgeschakeld krijgt een site melding te zien -->
        <noscript>
            <div>
                <p>Het lijkt erop dat JavaScript is uitgeschakeld in uw browser. <br>Hierdoor kunt u waarschijnlijk geen gebruik maken van de website.</p>
            </div>
        </noscript> 
    </main>
</body>
</html>