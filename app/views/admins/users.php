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
            <b>Felhasználói lista</b>
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#newUser">+ Új felhasználó hozzáadása</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="userSearch">
                <thead>
                    <tr>
                        <th class="text-center col-1">#</th>
                        <th class="text-center col-3">Felhasználónév</th>
                        <th class="text-center col-3">Email</th>
                        <th class="text-center col-2">Típus</th>
                        <th class="text-center col-3">Művelet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['users'] as $users): ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $users->id;?>
                        </td>
                        <td class="text-center">
                            <span><?php echo $users->username;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $users->email;?></span>
                        </td>
                        <td class="text-center">
                            <span><?php echo $users->type;?></span>
                        </td>
                        <td class="text-center">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <a href="#editUser<?php echo $users->id?>" class="btn btn-outline-info col-10 text-center" data-toggle="modal" id="userButtonEdit">MÓDOSÍT</a>
                                    </div>
                                    <div class="col">
                                    <form action="<?php echo URLROOT . "/admins/deleteUser/" . $users->id ?>" method="POST" onsubmit="return confirm('Biztosan törölni szeretné?')">
                                        <input type="submit" name="deleteUser" value="TÖRÖL" class="btn btn-outline-danger col-10"id="userButtonDelete">
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </td> 
                        <div class="modal" tabindex="-1" id="editUser<?php echo $users->id?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fa fa-plus"></i> Felhasználó módosítás</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <form action="<?php echo URLROOT;?>/admins/editUser/<?php echo $users->id?>" id="manage-users" method="POST">
                                            <div class="form-group">
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Felhasználónév</label>
                                                    <input type="text" name="username" class="form-control" value="<?php echo $users->username?>" required="">
                                                </div>
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $users->email?>" required="">
                                                </div>
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Jelszó</label>
                                                    <input type="password" name="password" class="form-control" value="">
                                                </div>
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Jelszó ismétlése</label>
                                                    <input type="password" name="confirmPassword" class="form-control" value="">
                                                </div>
                                                <div class="col-12 my-3">
                                                    <label class="control-label">Felhasználó típusa</label>
                                                    <input type="text" name="type" class="form-control" value="<?php echo $users->type?>" required="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
                                                <a href="<?php echo URLROOT; ?>/admins/users" id="cancel" class="bg-secondary">MÉGSE</a>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="modal" tabindex="-1" id="newUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Új felhasználó</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="<?php echo URLROOT;?>/admins/createAdminUsers" id="manage-users" method="POST">
                            <div class="form-group">
                                <div class="col-12 my-3">
                                    <label class="control-label">Felhasználónév</label>
                                    <input type="text" name="username" class="form-control" value="" required="">
                                </div>
                                <div class="col-12 my-3">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="" required="">
                                </div>
                                <div class="col-12 my-3">
                                    <label class="control-label">Jelszó</label>
                                    <input type="password" name="password" class="form-control" value="" required="">
                                </div>
                                <div class="col-12 my-3">
                                    <label class="control-label">Jelszó ismétlése</label>
                                    <input type="password" name="confirmPassword" class="form-control" value="" required="">
                                </div>
                                <div class="col-12 my-3">
                                    <label class="control-label">Felhasználó típusa</label>
                                    <select name="type" required="" class="custom-select" id="">
                                        <?php foreach($data['distinctUsers'] as $distinctUsers): ?>
                                            <option><?php echo $distinctUsers->type;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
                                <a href="<?php echo URLROOT; ?>/admins/users" id="cancel" class="bg-secondary">MÉGSE</a>
                            </div>
                            </form>
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
    
