<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">    
    <h1>Alta de producto</h1>

    <form class="form" action="/product/store" method="POST">

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input class="form-control" type="text" name="name"> 
    </div>

    <div class="form-group">
        <label for="type_id">Tipo:</label>
        <select name="type_id" id="type_id" class="form-control">
            <?php foreach ($types as $type) {?>
                <option value="<?= $type->id ?>"><?= $type->name?>
           <?php }?>
           </option>
        </select>
    </div>

    <div class="form-group">
        <label for="price">Precio:</label>
        <input class="form-control" type="text" name="price"> 
    </div>

    <div class="form-group">
        <input class="form-control" type="submit" value="Guardar"> 
    </div>

    </form>
</main>

<?php include('../views/parts/footer.php'); ?>
