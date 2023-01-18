<?php
require_once './inc/functions.php';

 $reviews = $controllers->reviews()->get_all_reviews();

foreach ($reviews as $reviews):
?>

    <div class="col-4 mt-5">
        <div class="card"> 
            <div class="card-body">
                <h5 class="card-title bg-dark"><?= $reviews['username'] ?></h5>
                <p class="card-text"><?= $reviews['comment'] ?></p>
            </div>
        </div>
    </div>

<?php 
endforeach;
?>
