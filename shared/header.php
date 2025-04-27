<header>
    <nav class="navbare">
        <div class="links">
            <a href="<?=url('')?>">Home</a>
            <a href="<?=url('crud/create.php')?>">Create</a>
            <a href="<?=url('crud/view.php')?>">View</a>
        </div>
        <div class="pages">
            <?php if(isset($_SESSION['user'])): ?>
                <span><?= $_SESSION['user']['name'] ?></span>
            <?php endif; ?>
            <a class="sign" href="<?=url('pages/login.php')?>" title="Sign in"><i class="user fa-solid fa-user"></i></a>
            <a href="<?=url('core/functions.php')?>?logout=done" title="Log out"><i class="log fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>
    </nav>
    
</header>