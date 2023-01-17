<?php 
    require_once 'inc/functions.php';

    if (!isset($_SESSION['user']))
    {
        redirect('login', ["error" => "You need to be logged in to view this page"]);
    }

    $title = 'Member Page'; 
    require __DIR__ . "/inc/header.php"; 
?>

<h1 class=" mt-5 text-center">Welcome <?= $_SESSION['user']['firstname'] ?? 'Member' ?>!</h1>

<html>
    <div class="container">
        <a class="btn btn-secondary w-100 mt-5" type="submit" href="review.php"> Go to reviews </a>
    </div>
</html>

<?php require __DIR__ . "/inc/footer.php"; ?>