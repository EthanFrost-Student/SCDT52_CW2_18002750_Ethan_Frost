<?php  
    require_once 'inc/functions.php';

    if (!isset($_SESSION['user']))
    {
        redirect('login', ["error" => "You need to be logged in to view this page"]);
    }

    $title = 'Review Page'; 
    require __DIR__ . "/inc/header.php"; 
?>


<?php require __DIR__ . "/components/review-form.php"?>


<?php require __DIR__ . "/inc/footer.php"; ?>


