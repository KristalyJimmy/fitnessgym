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
<?php
    require APPROOT.'/views/includes/footer.php';
?>
<div class="col-8 mx-auto" >
    <div class="card shadow-sm rounded-lg" id="trainerTypesMember" >
        <div class="card-header">
            <b>Edzői lista</b>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="trainerSearchForMembers">
                <thead>
                    <tr>
                        <th class="text-center col-1">#</th>
                        <th class="text-center col-1">Azonosítószám</th>
                        <th class="text-center col-2">Név</th>
                        <th class="text-center col-2">Elérhetőség</th>
                        <th class="text-center col-2">Email</th>
                        <th class="text-center col-2">Állapot</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach($data['trainers'] as $trainers): ?>
                    <tr>
                        <td class="text-center"><?php echo $trainers->id;?></td>
                        <td class="text-center">
                            <span><?php echo $trainers->trainer_id;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $trainers->trainer_name;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $trainers->contact;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $trainers->email;?></span>
                        </td>
                        <td class="text-center">
                        <?php if($trainers->status == "Elérhető"): ?>
                            <span class="text-success">Elérhető</span>
                        <?php elseif($trainers->status == "Foglalt"): ?>
                            <span class="text-danger">Foglalt</span>
                        <?php endif;?>
                        </td>
                    </tr>		
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
