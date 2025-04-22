<?php
include_once "../shared/head.php";
?>
<div class="bg-body">
    <div class="container col-6">
        <div class="row">
            <div class="card">
                <div class="card-title">
                    <h3>Craete New Product</h3>
                </div>
                <div class="card-body">
                    <form action="./store.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label">Name: </label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image: </label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Karat: </label>
                            <input type="number" class="form-control" name="karat" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Color: </label>
                            <input type="text" class="form-control" name="color" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Size: </label>
                            <input type="number" class="form-control" name="size" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price: </label>
                            <input type="number" class="form-control" name="price" step="0.01" required>
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

<?php
include_once "../shared/footer.php";
?>