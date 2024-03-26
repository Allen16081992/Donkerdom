<?php 
    // Wipe everything session related.
    session_start();
    session_unset();
    session_destroy();
    // Push back to homepage.
    header('location: ../index.html');