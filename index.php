<?php require __DIR__ . "/inc/header.php"; ?>


<html>

  <div class="container-fluid">
    <img src="images/Judith_Goss_Banner.jpg" alt="Banner" width="100%" height="50%">
  </div>

  <div class="container">
    <h1 class="mb-2 mt-4 text-center">Looking for a set of flowers for a special someone?</h1>
  </div>

  <div class="container-fluid ms-4 mt-5 p-1">
    <form action="/search" method="get">
      <input type="text" name="text" placeholder="Search our products...">
      <button type="submit">Search</button>
    </form>
  </div>


  <section class="vh-200 text-center">
      <div class="container py-2 h-75">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <?php require __DIR__ . "/components/products.php"; ?>
        </div>
      </div>
  </section> 


  <h1 class="text-center pt-4 mt-3">Reviews</h1>
  <section class="vh-50 text-center">
      <div class="container py-3 h-75">
        <div class="row d-flex justify-content-center h-100">
          <?php require __DIR__ . "/components/reviews.php"; ?>
        </div>
      </div>
  </section> 

</html>



<?php require __DIR__ . "/inc/footer.php"; ?>


