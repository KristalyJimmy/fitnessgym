<?php 
if(!isLoggedInAdmin()) {
    header("location: ".URLROOT."/pages/index");
}
?>
<?php 
     require APPROOT.'/views/includes/navigationHome.php';
?>
<?php
    require APPROOT.'/views/includes/head.php';
?>
<?php
    require APPROOT.'/views/includes/sidebar.php';
?>
<div class="col-md-8">
    <div class="card shadow-sm rounded-lg">
        <div class="card-header">
            <b>Tagság érvényességi lista</b>
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#newMembership">+ Új tagság hozzáadása</button>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered table-hover" id="membershipSearch" >
                <thead>
                    <tr>
                        <th class="text-center col-1">#</th>
                        <th class="text-center col-1">Azonosítószám</th>
                        <th class="text-center col-2">Tag neve</th>
                        <th class="text-center col-2">Bérlet</th>
                        <th class="text-center col-1">Azonosítószám</th>
                        <th class="text-center col-2">Edző neve </th>
                        <th class="text-center col-1">Állapot</th>
                        <th class="text-center col-2">Művelet</th>
                    </tr>
                </thead>
                <tbody>  
                <?php foreach($data['membershipValidity'] as $membershipValidity): ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $membershipValidity->membership_id; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $membershipValidity->member_id;?>
                        </td>
                        <td class="text-center">
                            <span><?php echo $membershipValidity->member_name;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $membershipValidity->plan.' '.$membershipValidity->type; ?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $membershipValidity->trainer_id;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $membershipValidity->trainer_name;?></span>
                        </td>
                        <td class="text-center">
                        <?php if($membershipValidity->membership_status == "Aktív"): ?>
                            <span class="text-success">Aktív</span>
                        <?php elseif($membershipValidity->membership_status == "Még nem aktív"): ?>
                            <span class="text-warning">Még nem aktív</span>
                        <?php elseif($membershipValidity->membership_status == "Lejárt"): ?>
                            <span class="text-danger">Lejárt</span>
                        <?php endif;?>
                        </td>
                        <td class="text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="#editMembership<?php echo $membershipValidity->membership_id ?>" class="btn btn-outline-info col-12 text-center" data-toggle="modal" id="membershipButtonView">NÉZET</a>
                                    </div>
                                    <div class="col-6">
                                        <form action="<?php echo URLROOT . "/admins/deleteMembership/" .$membershipValidity->membership_id; ?>" method="POST" id="membershipForm" onsubmit="return confirm('Biztosan törölni szeretné?')">
                                        <input  type="submit" name="deleteMembership" value="TÖRÖL" class="btn btn-outline-danger col-12" id="deleteMembershipButton" >
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>      
                    <div class="modal" tabindex="-1" id="editMembership<?php echo $membershipValidity->membership_id;?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-plus"></i> Tagság érvényessége</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form action="<?php echo URLROOT;?>/admins/editMembership/
                                        <?php echo $membershipValidity->membership_id;?>" id="manage-plan" method="POST" >
                                            <div class="form-group">
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Tag</label>
                                                    <input type="text" name="member_id" value="<?php echo $membershipValidity->member_id.' - '.$membershipValidity->member_name;?>" readonly>
                                                </div>
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Bérlet típus</label>
                                                    <input type="text" name="plan_id" value="<?php echo $membershipValidity->plan.' '.$membershipValidity->type; ?>" readonly>
                                                </div>
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Bérlet kezdete</label>
                                                    <input type="date" name="start_date" id="startDate" value="<?php echo $membershipValidity->start_date?>" readonly>
                                                </div>
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Bérlet lejárata</label>
                                                    <input type="date" name="end_date" id="endDate" value="<?php echo $membershipValidity->end_date?>" readonly>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?php echo URLROOT; ?>/admins/membershipValidity" id="cancel" class="bg-secondary">VISSZA</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>       
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="newMembership">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Új tagság</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="<?php echo URLROOT;?>/admins/createMembership" id="manage-plan" method="POST" >
                        <div class="form-group">
                            <div class="col-12 my-3">
                                <label class="control-label">Tagok</label>
                                <select name="member_id" required="" class="custom-select" id="">
                                <?php foreach($data['members'] as $members): ?>
                                    <option> <?php echo $members->member_id.' - '.$members->member_name ;?></option>
                                <?php endforeach;?>  
                                </select>
                            </div>
                            <div class="col-12 my-3">
                                <label class="control-label">Bérlet típus</label>
                                <select name="plan_id" required="" class="custom-select" id="">
                                <?php foreach($data['plans'] as $plans): ?>
                                    <option><?php echo $plans->plan_id.'. - '.$plans->plan.' '.$plans->type; ?></option>
                                <?php endforeach;?>  
                                </select>
                            </div>
                            <div class="col-12 my-3">
                                <label class="control-label">Edzők</label>
                                <select name="trainer_id" required="" class="custom-select" id="">
                                    <option name="default" value="0">Nincs</option>
                                <?php foreach($data['trainers'] as $trainers): ?>
                                <?php if($trainers->status == "Elérhető"): ?>
                                    <option><?php echo $trainers->trainer_id.' - '.$trainers->trainer_name; ?></option>
                                <?php endif; ?>
                                <?php endforeach;?> 
                                </select>
                            </div>
                            <div class="col-12 my-3">
                                <label class="control-label">Bérlet kezdete</label>
                                <input type="date" name="start_date" id="startDate" required>
                            </div>
                            <div class="col-12 my-3">
                                <input type="hidden" name="membership_status">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
                            <a href="<?php echo URLROOT; ?>/admins/membershipValidity" id="cancel" class="bg-secondary">MÉGSE</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require APPROOT.'/views/includes/footer.php';
?>