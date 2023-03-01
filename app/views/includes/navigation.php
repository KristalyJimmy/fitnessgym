<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <span class="navbar-brand"> Fitness Gym</span>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto col-3">
                <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/pages/index">Kezdőlap</a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">Info</a>
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Elérhetőség</a>
                <?php if(isset($_SESSION['user_id'])): ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Kijelentkezés</a>
                <?php else : ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Bejelentkezés</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>