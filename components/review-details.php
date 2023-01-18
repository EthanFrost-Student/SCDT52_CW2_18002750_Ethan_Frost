<?php
require_once './inc/functions.php';

$id = $_GET['id'] ?? '';

if (!empty($id)) {

    $reviews = $controllers->reviews()->get_reviews_by_id($id);

    if ($reviews): ?>
    
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title"><?= $reviews['username'] ?></h4>
                <p class="card-text"><?= $reviews['comment'] ?></p>
            </div>
        </div>

    <?php 
     else: redirect("not-found"); //404 file not found
     endif ?>

<?php
} 
else 
{
    redirect("not-found"); //404 file not found
}
?>