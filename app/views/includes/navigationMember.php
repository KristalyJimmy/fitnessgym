<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand"><i class="fas fa-dumbbell"></i> Fitness Gym</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="<?php echo URLROOT; ?>/members/index"> <i class="fas fa-home px-2"></i>Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="<?php echo URLROOT; ?>/members/plans"><i class="fas fa-address-card px-2"></i> Bérletek</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="<?php echo URLROOT; ?>/members/trainers"><i class="fas fa-running px-2"></i> Edzők</a>
                    </li>       
                    <li class="nav-item dropdown">
                        <?php if(isset($_SESSION['user_id'])): ?>
                        <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user px-2"></i> <?php echo $_SESSION['username'];?>
                        </a>
                        <div class="dropdown-menu shadow-sm" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item rounded-sm" href="<?php echo URLROOT; ?>/users/logout">
                                <i class="fa fa-solid fa-door-open"></i> Kijelentkezés
                            </a>
                        </div>
                        <?php endif;?> 
                    </li>  
                </ul> 
            </div>
        </div>
    </nav>