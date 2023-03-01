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
            <b>Tagság lista</b>
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#newMember">+ Új tag hozzáadása</button>
        </div>
        <div class="card-body" >
            <table class="table table-bordered table-hover" id="memberSearch" >
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center col-1">Azonosítószám</th>
                        <th class="text-center col-3">Név</th>
                        <th class="text-center col-3">Email</th>
                        <th class="text-center col-2">Telefon</th>
                        <th class="text-center col-3">Művelet</th>
                    </tr>
                </thead>
                <tbody >
                <?php foreach($data['members'] as $members): ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $members->id;?>
                        </td>
                        <td class="text-center">
                            <span><?php echo $members->member_id;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $members->member_name;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $members->email;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $members->contact;?></span>
                        </td>
                        <td class="text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <a href="#editMember<?php echo $members->id?>" class="btn btn-outline-info col-10 text-center" data-toggle="modal" id="memberButtonEdit">MÓDÓSÍT</a>
                                    </div>
                                    <div class="col">
                                        <form action="<?php echo URLROOT . "/admins/deleteMember/" . $members->id ?>" method="POST" id="memberDeleteForm" onsubmit="return confirm('Biztosan törölni szeretné?')">
                                            <input type="submit" name="deleteMember" value="TÖRÖL" class="btn btn-outline-danger col-10" id="memberButtonDelete">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <div class="modal" tabindex="-1" id="editMember<?php echo $members->id?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="fa fa-plus"></i> Tag módosítás</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <div class="container-fluid">
                                        <form action="<?php echo URLROOT;?>/admins/editMember/<?php echo $members->id?>" id="manage-member" method="POST">
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    <label class="control-label">Azonosítószám</label>
                                                    <input type="number" name="member_id" class="form-control" maxlength="6" size="6" value="<?php echo $members->member_id?>">
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label">Nem</label>
                                                    <select name="gender" required="" class="custom-select" id="">
                                                    <option><?php echo $members->gender; ?></option>
                                                    <?php if($members->gender == 'Férfi'): ?>
                                                    <option>Nő</option>
                                                    <?php elseif($members->gender == 'Nő'): ?>
                                                    <option>Férfi</option>
                                                    <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    <label class="control-label">Név</label>
                                                    <input type="text" name="member_name" class="form-control" value="<?php echo $members->member_name?>" required="">
                                                </div>
                                                <div class="col-6">
                                                    <label class="control-label">Telefon</label>
                                                    <input type="number" name="contact" class="form-control" value="<?php echo $members->contact?>" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-12">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="<?php echo $members->email?>" required="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
                                                <a href="<?php echo URLROOT; ?>/admins/members" id="cancel" class="bg-secondary">MÉGSE</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="newMember">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-plus"></i> Új tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                        <form action="<?php echo URLROOT;?>/admins/createMembers" id="manage-member" method="POST">
                            <div id="msg"></div>
                            <input type="hidden" name="id" value="" class="form-control">
                            <div class="row form-group">
                                <div class="col-6">
                                    <label class="control-label">Azonosítószám</label>
                                    <input type="number" name="member_id" class="form-control" maxlength="6" size="6" value="<?php echo generateRandomId();?>">
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
                                    <input type="text" name="member_name" class="form-control" value="" required="">
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
                                <a href="<?php echo URLROOT; ?>/admins/members" id="cancel" class="bg-secondary">MÉGSE</a>
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
