<?php 
    if(!isLoggedInMember()) {
        header("location: ".URLROOT."/pages/index");
    } 
?>
<?php  
    require APPROOT.'/views/includes/navigationMember.php';
?>
<?php
    require APPROOT.'/views/includes/head.php';
?>
<div class="container-fluid">
        <div class="row mt-3 ml-3 mr-3" >
            <div class="col-lg-12" >
                <div class="card" id="indexMember">
                    <div class="card-body"><div class="text-info fa-2x">Üdvözlünk <?php echo $_SESSION['username'];?>!</div><hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card"   id="memberCard1">
                                    <div class="card-body bg-info rounded-sm">
                                        <div class="card-body text-white">
                                            <span class="float-right summary_icon"><i class="fas fa-user-friends fa-5x"></i></i></span>
                                            
                                            <?php foreach($data['activeMember'] as $activeMember): ?>
                                            <h4 class="fa-2x"><b><?php echo $activeMember->member_name;?></b></h4>  
                                            <?php endforeach; ?>
                                            <?php foreach($data['membershipValidity'] as $membershipValidity): ?>
                                            <span class="fa-2x" ><?php echo $membershipValidity->membership_status; ?>  bérlettel rendelkezel!<br></b></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card"  id="memberCard2">
                                    <div class="card-body bg-info rounded-sm">
                                        <div class="card-body text-white">
                                            <span class="float-right summary_icon"><i class="fas fa-file-invoice-dollar fa-5x"></i></i></span>
                                            <?php if($data['membershipValidity'] == null): ?>
                                            <span class="fa-2x"><b>Jelenleg nincs bérleted!</b></span>
                                            <?php endif; ?>
                                            <?php foreach($data['membershipValidity'] as $membershipValidity): ?>
                                            <span class="fa-2x"><b>Bérleted kezdete</b></span>
                                            <h4 class="fa-2x"><b><?php echo $membershipValidity->start_date;?></b></h4>
                                            <span class="fa-2x"><b>Bérleted lejárata</b></span>
                                            <h4 class="fa-2x"><b><?php echo $membershipValidity->end_date;?></b></h4>
                                           
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card"   id="memberCard3">
                                    <div class="card-body bg-info rounded-sm">
                                        <div class="card-body text-white">
                                            <span class="float-right summary_icon"><i class="fas fa-running fa-5x"></i></span>
                                            <span class="fa-2x"><b>Elérhető edzők</b></span>
                                            <h4 class="fa-2x"><b><?php echo $data['availableTrainers'];?></b></h4>
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