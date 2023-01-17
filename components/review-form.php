<?php
require_once './inc/functions.php';

$message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
$email = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = InputProcessor::processEmail($_POST['email']);
    $password = InputProcessor::processPassword($_POST['password']);

    $valid = $email['valid'] && $password['valid'];

    if ($valid) {
  
      $member = $controllers->members()->login_member($email['value'], $password['value']);

      if (!$member) {
        $message = "User details are incorrect.";
     } else {
         $_SESSION['user'] = $member; 
         redirect('member');
      }

    }
    else {
       $message =  "Please fix the above errors. ";
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
                <input type="text" id="review_comment" name="comment" class="form-control form-control-lg" placeholder="Review Section" required value="<?= htmlspecialchars($fname['value'] ?? '') ?>"/>
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