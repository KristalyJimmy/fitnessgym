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
<div class="card-group col-6" id="planTypesMember">
    <div class="card shadow-sm rounded-lg"  >
        <div class="card-header">
            <b>Bérlet típusok</b>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center col-1">#</th>
                        <th class="text-center col-3">Bérlet</th>
                        <th class="text-center col-3">Összeg (Ft)</th>
                    </tr>
                </thead>
                <?php foreach($data['plans'] as $plans): ?>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <p><?php echo $plans->plan_id;?></p>
                        </td>
                        <td class="text-center">
                            <p><?php echo $plans->plan;?> <?php echo $plans->type;?></p>
                        </td>
                        <td class="text-center">
                            <p><?php echo $plans->amount;?></p>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>	
        </div>
    </div>
</div>
<?php
    require APPROOT.'/views/includes/footer.php';
?>