<?php 
    if(!isset($_SESSION['type'])) {
?>
<?php
    require APPROOT.'/views/includes/head.php';
?>
<?php
    require APPROOT.'/views/includes/navigation.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-5 mx-auto text-secondary shadow-sm rounded-lg bg-light m-3">
            <h1 class="col-12 text-center text-secondary my-4">Bejelentkezés</h1>
            <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                <div class="col-6 mx-auto m-3 p-3 bg-info text-white shadow-sm rounded-lg">
                    <h3 class="col-12 mx-auto text-center m-3">Felhasználónév</h3>
                        <input type="text" class="form-control col-8 mx-auto m-3 shadow-sm rounded-lg" name="username">
                        <span class="invalidFeedback text-center text-warning">
                            <?php echo $data['usernameError']; ?>
                            <?php echo $data['emailError'];?>
                        </span>
                    <h3 class="col-12 mx-auto text-center mt-0 mb-3 ">Jelszó</h3>
                        <input type="password" class="form-control col-8 mx-auto m-3 shadow-sm rounded-lg" name="password">
                        <span class="invalidFeedback text-center text-warning">
                            <?php echo $data['passwordError'];?>
                        </span>
                </div>
                <button type="submit" id="submit" value="submit" class="btn btn-info shadow-sm rounded-lg mx-auto d-block  col-3 m-3">BELÉPÉS</button>
                <h6 class="text-info text-center my-2 mb-4 fs-3">Még nem regisztrált? <a href="<?php echo URLROOT; ?>/users/register" class="text-primary">Készítsen felhasználót!</a></h6>
            </form>
        </div>  
    </div>    
</div>
<?php
} else {
    if(isLoggedInAdmin()) {
        header('Location: '.URLROOT."/admins/index");
    }
    if(isLoggedInMember()) {
        header('Location: '.URLROOT."/members/index");
    }
   
}