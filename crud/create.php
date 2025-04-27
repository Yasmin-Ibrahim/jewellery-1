<?php
include_once "../shared/head.php";
include_once "../shared/header.php";

auth(2);
?>
<div class="bg-body">
    <div class="container col-6">
        <div class="row">
            <div class="card">
                <?php if(isset($_SESSION['validMessage'])): ?>
                    <div id="alert_message" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message!</strong>
                        <?=$_SESSION['validMessage'] ?>
                        <form action="<?=url('core/functions.php')?>" method="POST">
                            <input type="hidden" name="old_path" value="<?=$current_url?>">
                            <button type="submit" name="delete_message" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </form>
                    </div>
                <?php endif ?>

                <?php if(isset($_SESSION['invalidMessage'])): ?>
                    <div id="alert_message" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            <?php foreach($_SESSION['invalidMessage'] as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <form action="<?=url('core/functions.php')?>" method="POST">
                            <input type="hidden" name="old_path" value="<?=$current_url?>">
                            <button type="submit" name="delete_message" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </form>
                    </div>
                <?php endif ?>

                <div class="card-title">
                    <h3>Craete New Product</h3>
                </div>
                <div class="card-body">
                    <form action="<?=url('server/store.php')?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Name: </label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image: </label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Karat: </label>
                            <input type="number" class="form-control" name="karat">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Color: </label>
                            <input type="text" class="form-control" name="color">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Size: </label>
                            <input type="number" class="form-control" name="size" step="0.01">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price: </label>
                            <input type="number" class="form-control" name="price" step="0.01">
                        </div>
                        <div class="create d-grid mt-5">
                            <button type="submit" name="submit" class="btn">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
let  alert_message = document.querySelectorAll("#alert_message");

for(let i=0; i<alert_message.length; i++){
    setTimeout(function(){
        alert_message[i].style.display = "none";
    }, 3000);
}
</script> -->

<?php
include_once "../shared/footer.php";
?>