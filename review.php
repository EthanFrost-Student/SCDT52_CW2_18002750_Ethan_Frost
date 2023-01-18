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


<section class="vh-100 text-center">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
      <?php require __DIR__ . "/components/review-details.php"; ?>
      </div>
    </div>
</section>


<?php require __DIR__ . "/inc/footer.php"; ?>


