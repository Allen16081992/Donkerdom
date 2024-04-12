<?php // Dhr. Allen Pieter 
    if (!isset($_SESSION)) {
        session_start();
    }

    // Handle logout operations
    if (isset($_POST['logout'])) {
        // Wipe everything session related.
        session_unset(); session_destroy();

        // Push back to homepage.
        header('location: ./index.html');
        exit();
    }
   
    // Verification for page permission
    function verify_UnauthorizedAccess() {
        if (!isset($_SESSION['session_data']['user_id'])) {
            // 401: Access denied. You must be signed in.
            header('Location: ././index.html');
            exit;
        }
        else {
            // Regenerate the session ID
            session_regenerate_id(true);
            // Update the last regeneration time
            $_SESSION['session_data']['last_regen'] = time();
        }
    }
    
    // Periodically regenerate the session ID to tackle session fixation and session hijacking
    function sessionRegenerateTimer() {
        $lastRegen = $_SESSION['last_regen'] ?? 0;
        $currentTime = time();
        $regenInterval = 900; // Regenerate every 15 minutes

        if ($currentTime - $lastRegen >= $regenInterval) {
            session_regenerate_id(true);
            $_SESSION['session_data']['last_regen'] = time();
        }
    }

    // Server message cleanup function
    function server_Messenger() {
        if (isset($_SESSION['error'])) {
            echo '<div class="error-msg">'.$_SESSION['error'].'</div>';
            $_SESSION['error'] = null; // Clear the server message on page reload
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="success-msg">'.$_SESSION['success'].'</div>';
            $_SESSION['success'] = null; // Clear the server message on page reload
        }
    }