<?php 
if(!isLoggedInAdmin()) {
    header("location: ".URLROOT."/pages/index");
}
?>
<?php
    require APPROOT.'/helpers/random_string.php'
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
            <b>Edzői lista</b>
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#newTrainer">+ Új edző hozzáadása</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="trainerSearch">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center col-1">Azonosítószám</th>
                        <th class="text-center col-2">Név</th>
                        <th class="text-center col-2">Telefon</th>
                        <th class="text-center col-2">Email</th>
                        <th class="text-center col-2">Állapot</th>
                        <th class="text-center col-3">Művelet</th>
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
                        <td class="text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <a href="#editTrainer<?php echo $trainers->id?>" class="btn btn-outline-info col-10 text-center" data-toggle="modal" id="trainerButtonEdit">MÓDOSÍT</a>
                                    </div>
                                    <div class="col">
                                        <form action="<?php echo URLROOT . "/admins/deleteTrainer/" . $trainers->id?>" method="POST" id="trainerDeleteForm" onsubmit="return confirm('Biztosan törölni szeretné?')">
                                            <input type="submit" name="deleteTrainer" value="TÖRÖL" class="btn btn-outline-danger col-10" id="trainerButtonDelete">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <div class="modal" tabindex="-1" id="editTrainer<?php echo $trainers->id?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="fa fa-plus"></i> Edző módosítás</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
						<div class="modal-body">
                            <div class="container-fluid">
                                <form action="<?php echo URLROOT;?>/admins/editTrainer/<?php echo $trainers->id?>" id="manage-trainer" method="POST">
                                    <div class="row form-group">
                                        <div class="col-6">
                                            <label class="control-label">Azonosítószám</label>
                                            <input type="text" maxlength="6" size="6" name="trainer_id" class="form-control" value="<?php echo $trainers->trainer_id?>">
                                        </div>
                                        <div class="col-6">
                                            <label class="control-label">Nem</label>
                                            <select name="gender" required="" class="custom-select" id="">
                                                <option><?php echo $trainers->gender; ?></option>
                                                <?php if($trainers->gender == 'Férfi'): ?>
                                                <option>Nő</option>
                                                <?php elseif($trainers->gender == 'Nő'): ?>
                                                <option>Férfi</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-6">
                                            <label class="control-label">Név</label>
                                            <input type="text" name="trainer_name" class="form-control" value="<?php echo $trainers->trainer_name?>" required="">
                                        </div>
                                        <div class="col-6">
                                            <label class="control-label">Telefon</label>
                                            <input type="number" name="contact" class="form-control" value="<?php echo $trainers->contact?>" required="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-6">
                                            <label class="control-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $trainers->email?>" required="">
                                        </div>
                                        <div class="col-6">
                                            <label class="control-label">Állapot</label>
                                            <select name="status" required="" class="custom-select" id="">
                                                <option><?php echo $trainers->status; ?></option>
                                                <?php if($trainers->status == 'Foglalt'): ?>
                                                <option>Elérhető</option>
                                                <?php elseif($trainers->status == 'Elérhető'): ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
                                            <a href="<?php echo URLROOT; ?>/admins/trainers" id="cancel" class="bg-secondary">MÉGSE</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="newTrainer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Új edző</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="<?php echo URLROOT;?>/admins/createTrainers" id="manage-member" method="POST">
                        <div class="row form-group">
                            <div class="col-6">
                                <label class="control-label">Azonosítószám</label>
                                <input type="text" maxlength="6" size="6" name="trainer_id" class="form-control" value="<?php echo generateRandomId();?>">
                            </div>
                            <div class="col-6">
                                <label class="control-label">Nem</label>
                                <select name="gender" required="" class="custom-select" id="">
                                    <option>Férfi</option>
                                    <option>Nő</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-6">
                                <label class="control-label">Név</label>
                                <input type="text" name="trainer_name" class="form-control" value="" required="">
                            </div>
                            <div class="col-6">
                                <label class="control-label">Telefon</label>
                                <input type="number" name="contact" class="form-control" value="" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col-12">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control" value="" required="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
                            <a href="<?php echo URLROOT; ?>/admins/trainers" id="cancel" class="bg-secondary">MÉGSE</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    require APPROOT.'/views/includes/footer.php';
?>
