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
            <b>Üzenetek lista</b>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered table-hover" id="messageSearch">
                <thead>
                <tr>
                    <th class="text-center col-1">#</th>
                    <th class="text-center col-2">Név</th>
                    <th class="text-center col-2">Email</th>
                    <th class="text-center col-1">Telefon</th>
                    <th class="text-center col-3">Üzenet</th>
                    <th class="text-center col-1">Kategória</th>
                    <th class="text-center col-1">Dátum</th>
                    <th class="text-center col-1">Művelet</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['message'] as $message): ?>
                    <tr>
                        <td class="text-center"><?php echo $message->id;?></td>
                        <td class="text-center">
                            <span><?php echo $message->name;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $message->email;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $message->telephone;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $message->message;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $message->category;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $message->date_created;?></span>
                        </td>
                        <td class="text-center">
                            <form action="<?php echo URLROOT . "/admins/deleteMessage/" . $message->id ?>" method="POST" onsubmit="return confirm('Biztosan törölni szeretné?')">
                                <input type="submit" name="deleteMessage" value="TÖRÖL" class="btn col-9 btn-outline-danger">
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