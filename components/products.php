<?php
require_once './inc/functions.php';

 $products =$controllers->products()->get_all_products();

foreach ($products as $product):
?>

    <div class="col-4 mt-5">
        <div class="card">
            <img src="<?= $product['image'] ?>" 
                class="card-img-top" 
                alt="image of <?= $product['description'] ?>">
            <div class="card-body">
                <h5 class="card-title bg-dark"><?= $product['name'] ?></h5>
                <p class="card-text"><?= $product['description'] ?></p>
                <p class="card-text"> £<?= $product['price'] ?></p>
            </div>
        </div>
    </div>

<?php 
endforeach;
?>
