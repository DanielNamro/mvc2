<?php

use App\Models\Product;

include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">    
    <h1>Detalle de tipo de producto</h1>
    <div class="card">
        <div class="card-header">
            <?= $productType->name ?>
        </div>
        <ul class="list-group list-group-flush">
        <?php
        foreach($productType->products as $product){
            ?>
            <li class="list-group-item"><?= $product->name ?></li> 
            <?php
        }
        ?>

        </ul>
  </div>    
</main>

<?php include('../views/parts/footer.php'); ?>