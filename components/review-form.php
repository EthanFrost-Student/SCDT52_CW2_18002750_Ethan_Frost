<?php
require_once './inc/functions.php';

$message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fname = InputProcessor::processString($_POST['fname']);
    $comment = InputProcessor::processString($_POST['comment']);

    $valid = $fname['valid'] && $comment['valid'];

    if($valid) 
    {
      
      $args = ['username' => $fname['value'] , 
              'comment' => $comment['value']
              ];

      $id = $controllers->reviews()->create_reviews($args);

      if(!empty($id) && $id > 0) {
        redirect('review', ['id' => $id]);
      }
      else 
      {
        $message = "Error adding review."; //Change
      }
    }
}
?>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-2">Write a review</h3>

              <div class="form-outline mb-4">
                <input type="text" id="fname" name="fname" class="form-control form-control-lg" placeholder="Firstname" required value="<?= $_SESSION['user']['firstname'] ?? 'Member' ?> <?= htmlspecialchars($fname['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= htmlspecialchars($fname['error'] ?? '') ?></span>
                </div>
  
              <div class="form-outline mb-4">
                <input type="text" id="review_comment" name="comment" class="form-control form-control-lg" placeholder="Review Section" required value="<?= htmlspecialchars($comment['value'] ?? '') ?>"/>
                  <span class="text-danger"><?= htmlspecialchars($fname['error'] ?? '') ?></span>
                </div>
  
              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Submit review</button>
              

              <?php if ($message): ?>
                <div class="alert alert-danger mt-4" role="alert">
                  <?= $message ?? '' ?>
                </div>
              <?php endif ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>