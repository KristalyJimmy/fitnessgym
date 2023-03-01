<?php 
    if(!isLoggedInAdmin()) {
        header("location: ".URLROOT."/pages/index");
    } 
?>
<?php  
    require APPROOT.'/views/includes/navigationHome.php';
?>
<?php
    require APPROOT.'/views/includes/sidebar.php';
?>
<?php
    require APPROOT.'/views/includes/head.php';
?>
<div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card" id="cardBox">
                        <div class="card-body" id="cardBody"><div class="text-info fa-2x">Üdvözlünk <?php echo $_SESSION['username'];?>!</div><hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body bg-info rounded-sm">
                                            <div class="card-body text-white">
                                                <span class="float-right summary_icon"><i class="fas fa-user-friends fa-5x"></i></i></span>
                                                <h4><b><?php echo $data['activeMembers'];?></b></h4>
                                                <span><b>Aktív tag</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body bg-info rounded-sm">
                                            <div class="card-body text-white">
                                                <span class="float-right summary_icon"><i class="fas fa-file-invoice-dollar fa-5x"></i></i></span>
                                                <h4><b><?php echo $data['planNumbers'];?></b></h4>
                                                <span><b>Bérlet típus</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body bg-info rounded-sm">
                                            <div class="card-body text-white">
                                                <span class="float-right summary_icon"><i class="fas fa-running fa-5x"></i></span>
                                                <h4><b><?php echo $data['availableTrainers'];?></b></h4>
                                                <span><b>Elérhető edző</b></span>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>	
                        </div>
                    </div>      			
                </div>
          </div>
      </div>
</div>
<?php
    require APPROOT.'/views/includes/footer.php';
?>

