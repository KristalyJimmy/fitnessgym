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
            <b>Befizetett számlák lista</b>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="paymentSearch">
                <thead>
                <tr>
                    <th class="text-center col-1">#</th>
                    <th class="text-center col-2">Tagság azonosító</th>
                    <th class="text-center col-2">Név</th>
                    <th class="text-center col-2">Bérlet</th>
                    <th class="text-center col-2">Összeg (Ft)</th>
                    <th class="text-center col-2">Dátum</th>
                    <th class="text-center col-1">Művelet</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['payment'] as $payment): ?>
                    <tr>
                        <td class="text-center"><?php echo $payment->payment_id;?></td>
                        <td class="text-center">
                            <span><?php echo $payment->member_id;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $payment->member_name;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $payment->plan.' '.$payment->type; ?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $payment->amount;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $payment->date_created;?></span>
                        </td>
                        <td class="text-center">
                            <form action="<?php echo URLROOT . "/admins/deletePayment/" . $payment->payment_id ?>" method="POST" onsubmit="return confirm('Biztosan törölni szeretné?')">
                                <input type="submit" name="deletePayment" value="TÖRÖL" class="btn col-9 btn-outline-danger">
                            </form>
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
