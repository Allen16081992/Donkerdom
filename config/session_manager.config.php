<?php // Dhr. Allen Pieter 
    if (!isset($_SESSION)) {
        session_start();
    }
   
    function verify_UnauthorizedAccess() {
        if ($_SESSION['session_data']['user_id'] ?? null !== null) {
            $_SESSION['error'] = '401: Access denied. You must be signed in.';
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