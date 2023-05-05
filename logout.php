<?php 
    session_start();
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
        session_destroy();
        header('Location: index.php'); // Redirect to home page with logout message
        exit();
    }
?>