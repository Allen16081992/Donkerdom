<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Cards</title>

    <style>
/* Resetting default margin and padding */
/* https://www.bootdey.com/snippets/view/profile-with-data-and-skills */
* {
    margin: 0;
    padding: 0;
    /* box-sizing: border-box; */
}

body {
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    padding: 20px;
}

.profile-card {
    flex: 1;
    margin: 8px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.avatar {
    width: 150px;
    height: 150px;
    background-color: gray; /* Placeholder color */
    border-radius: 50%; /* Creates a round shape */
}

button {
    padding: 8px 16px;
    border: none;
    background-color: rgb(25,162,181);
    color: #fff;
    cursor: pointer;
    border-radius:5px;
}

button:hover {
    background-color: rgb(62,149,163);
}

/* Adjust size and shape for specific cards */
.profile-card:nth-child(odd) {
    flex-basis: calc(30% - 40px); /* Set width for odd cards (1 and 3) */
}

.profile-card:nth-child(even) {
    flex-basis: calc(50% - 40px); /* Set width for even cards (2 and 4) */
    border-radius: 8px; /* Make even cards rectangular */
}

.profile-card:nth-child(1) {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.profile-card form {
    /* max-width: 5rem; */
    max-width:100%;
    box-sizing: border-box;
}

form {
    margin:10px;
}
form input {
    width: 100%;
}
input[type=text] {
  width: 97%;
  padding: 0.6em;
  font-size: 1em;
  margin-bottom:8px;
  border: none;
  border-bottom: 1px solid rgb(176, 174, 174);
}
input[type=text]:focus {
  outline:none;
}

/* Responsive */
@media screen and (max-width: 600px) {
    .container {
        flex-direction: column;
        align-items: center;
    }

    .profile-card {
        flex-basis: calc(100% - 40px);
    }
}


    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <!-- Placeholder for avatar -->
            <div class="avatar"></div>
            <strong>Jane Donetsk</strong>
            <p>Full Stack Developer</p>
        </div>
        <div class="profile-card">
            <div class="details">
                <?php
                    if(isset($_POST['edit'])) {
                        echo '
                            <form action="" method="post">
                                <label for="fullname">Full Name</label>
                                <input type="text" name="fullname">
                                <label for="email">Email</label>
                                <input type="text" name="email">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" min="1" max="11">
                                <label for="postal">Postalcode</label>
                                <input type="text" name="postal">
                                <label for="city">City</label>
                                <input type="text" name="city" placeholder="City">
                                <button name="save">Opslaan</button>
                                <button name="cancel" style="background:grey;">X</button>
                            </form>
                        ';
                    }
                    else {
                        echo ' 
                            <form action="" method="post">                      
                                <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" disabled>
                                <label for="email">Email</label>
                                <input type="text" name="email" disabled>
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" min="1" max="11" disabled>
                                <label for="postal">Postalcode</label>
                                <input type="text" name="postal" disabled>
                                <label for="city">City</label>
                                <input type="text" name="city" placeholder="City" disabled>
                                <button name="edit">Edit</button>
                            </form>
                        ';
                    }
                    // <p><strong>Full Name</strong> John Doe</p>
                    // <p><strong>Email</strong> johndoe@example.com</p>
                    // <p><strong>Mobile</strong> +1234567890</p>
                    // <p><strong>Address</strong> 123 Main Street, City, Country</p>
                    // <form action="" method="post">
                    //     <button name="edit">Edit</button>
                    // </form>
                ?>
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
</body>
</html>