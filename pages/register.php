<?php
include_once "../shared/head.php"
?>
<div class="bg-body">
    <div class="container col-6">
        <div class="card card-edit">
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
                <h3>Register Now</h3>
            </div>
            <div class="card-body">
                <form action="<?=url('server/register.php')?>" method="POST">
                    <div class="form-group">
                        <label class="form-label">Name: </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email: </label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password: </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone: </label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Age: </label>
                        <input type="text" class="form-control" name="age">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Country: </label>
                        <input type="text" class="form-control" name="country">
                    </div>
                    <div class="register">
                        <button type="submit" class="btn" name="register" >Register</button>
                        <p>Already have an account?</p>
                        <a href="<?=url('pages/login.php')?>"> log in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once "../shared/footer.php"
?>