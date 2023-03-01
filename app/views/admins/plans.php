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
			<b>Bérlet típusok</b>
			<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#newPlan" id="modal1">+ Új bérlet hozzáadása</button>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-hover" id="planSearch">
				<thead>
					<tr>
						<th class="text-center col-1">#</th>
						<th class="text-center col-3">Bérlet</th>
						<th class="text-center col-2">Összeg (Ft)</th>
						<th class="text-center col-2">Művelet</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($data['plans'] as $plans): ?>
					<tr>
						<td class="text-center"><?php echo $plans->plan_id;?></td>
						<td class="text-center">
							<span><b><?php echo $plans->plan;?></b> <?php echo $plans->type;?></span>
						</td>
						<td class="text-center">
							<?php echo $plans->amount;?>
						</td>
						<td class="text-center">
							<div class="container-fluid">
								<div class="row">
									<div class="col-6">
										<a href="#editPlan<?php echo $plans->plan_id?>" class="btn btn-outline-info col-10 text-center" data-toggle="modal" id="planButtonEdit">MÓDOSÍT</a>
									</div>
									<div class="col-6">
										<form action="<?php echo URLROOT . "/admins/deletePlan/" . $plans->plan_id ?>" method="POST" id="planDeleteForm" onsubmit="return confirm('Biztosan törölni szeretné?')">
											<input type="submit" name="deletePlan" value="TÖRÖL" class="btn btn-outline-danger col-10 ml-2" id="planButtonDelete">
										</form>
									</div>
								</div>
							</div>
						</td>
						<div class="modal" tabindex="-1" id="editPlan<?php echo $plans->plan_id?>">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"><i class="fa fa-plus"></i> Bérlet módosítás</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<div class="container-fluid">
									<form action="<?php echo URLROOT;?>/admins/editPlan/<?php echo $plans->plan_id?>" id="edit-plan" method="POST">
										<div class="form-group">
											<div class="col-12 my-3">
												<label class="control-label">Bérlet típus</label>
												<select name="type" required="" class="custom-select" id="">
												<?php foreach($data['distinctPlan'] as $distinctPlan): ?>
													<option><?php echo $distinctPlan->type;?></option>
												<?php endforeach;?>
												</select>
											</div>
											<div class="col-12 my-3">
												<label class="control-label">Alkalmak száma</label>
												<input type="number" name="plan" class="form-control" value="<?php echo $plans->plan?>" required="">
											</div>
											<div class="col-12 my-3">
												<label class="control-label">Összeg (Ft)</label>
												<input type="number" name="amount" class="form-control" value="<?php echo $plans->amount?>"required="">
											</div>
										</div>
										<div class="modal-footer">
										<button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
										<a href="<?php echo URLROOT; ?>/admins/plans" id="cancel" class="bg-secondary">MÉGSE</a>
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
	<div class="modal" tabindex="-1" id="newPlan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa fa-plus"></i> Új bérlet</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<form action="<?php echo URLROOT;?>/admins/createPlan" id="manage-plan" method="POST">
							<div class="form-group">
								<div class="col-12 my-3">
									<label class="control-label">Bérlet típus</label>
									<input type="text" name="type" class="form-control" value="" required="">
								</div>
								<div class="col-12 my-3">
									<label class="control-label">Alkalmak száma</label>
									<input type="number" name="plan" class="form-control" value="" required="">
								</div>
								<div class="col-12 my-3">
									<label class="control-label">Összeg (Ft)</label>
									<input type="number" name="amount" class="form-control" value="" required="">
								</div>
							</div>
							<div class="modal-footer">
							<button type="submit" name="submit" id="submit" class="btn bg-info">MENTÉS</button>
							<a href="<?php echo URLROOT; ?>/admins/plans" id="cancel" class="bg-secondary">MÉGSE</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
    require APPROOT.'/views/includes/footer.php';
?>

			

			
		