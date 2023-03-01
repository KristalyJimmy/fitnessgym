<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand"><i class="fas fa-dumbbell"></i> Fitness Gym</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto col-1">        
                    <li class="nav-item dropdown">
                        <?php if(isset($_SESSION['user_id'])): ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?>
                        </a>
                        <div class="dropdown-menu shadow-sm" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item rounded-sm" href="<?php echo URLROOT; ?>/users/logout">
                                <i class="fa fa-solid fa-door-open"></i> Kijelentkezés
                            </a>
                        </div>
                        <?php endif; ?> 
                    </li>  
                </ul> 
            </div>
        </div>
    </nav>