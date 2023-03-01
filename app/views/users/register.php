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
            <h1 class="col-12 text-center text-secondary my-4">Regisztráció</h1>
            <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                <div class="col-6 mx-auto m-3 p-3 bg-info text-white shadow-sm rounded-lg">
                    <h3 class="col-12 mx-auto text-center m-3">Felhasználónév</h3>
                    <input type="text" name="username" class="form-control col-8 mx-auto m-3 shadow-sm rounded-lg">
                    <span class="invalidFeedback text-center text-warning">
                        <?php echo $data['usernameError']; ?>
                    </span>
                    <h3 class="col-12 mx-auto text-center m-3">Email</h3>
                    <input type="email" name="email" class="form-control col-8 mx-auto m-3 shadow-sm rounded-lg">
                    <span class="invalidFeedback text-center text-warning">
                        <?php echo $data['emailError']; ?>
                    </span>
                    <h3 class="col-12 mx-auto text-center m-3">Jelszó</h3>
                    <input type="password" name="password" class="form-control col-8 mx-auto m-3 shadow-sm rounded-lg">
                    <span class="invalidFeedback text-center text-warning">
                        <?php echo $data['passwordError']; ?>
                    </span>
                    <h3 class="col-12 mx-auto text-center m-3">Jelszó ismétlése</h3>
                    <input type="password" name="confirmPassword"
                        class="form-control col-8 mx-auto m-3 shadow-sm rounded-lg">
                    <span class="invalidFeedback text-center text-warning">
                        <?php echo $data['confirmPasswordError']; ?>
                    </span>
                </div>
                <button type="submit" id="submit" value="submit"
                    class="btn btn-info shadow-sm rounded-lg mx-auto d-block  col-3 mb-4">ELKÜLDÉS</button>
            </form>
        </div>
    </div>
</div>
<?php
    require APPROOT.'/views/includes/footer.php';
?>
<?php
} else {
    if(isLoggedInAdmin()) {
        header('Location: '.URLROOT."/admins/index");
    }
    if(isLoggedInMember()) {
        header('Location: '.URLROOT."/members/index");
    }
}