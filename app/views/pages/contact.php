<?php
    require APPROOT.'/views/includes/head.php';
?>
<?php
	require APPROOT.'/views/includes/navigation.php';
?>
    <div class="container bg-light mx-auto m-3 rounded">
		<div class="row" id="box">
			<h1 class="col-12 text-center my-4 text-secondary">Elérhetőség</h1>
			<div class="col-12 col-sm-10 col-xl-9 mx-auto mb-4 p-3 bg-info text-light shadow rounded">
				<h3 class="text-center mt-0 mb-3">Küldjön üzenetet!</h3>
				<form action="<?php echo URLROOT; ?>/pages/contact" method="POST" class="form-row" onsubmit="return contactAlert()">
					<div class="col-12 col-md-8 col-lg-6 mx-auto mb-3 form-inline">
						<label class="col-12 col-sm-2 text-center">Név:</label>
						<input class="col-12 col-sm-10 form-control" type="text" name="name" required>
					</div>
					<div class="col-12 col-md-8 col-lg-6 mx-auto mb-3 form-inline">
						<label class="col-12 col-sm-2 text-center">Email:</label>
						<input class="col-12 col-sm-10 form-control" type="email" name="email" required>
					</div>
					<div class="col-12 col-md-8 col-lg-6 mx-auto mb-3 form-inline">
						<label class="col-12 col-sm-2 text-center">Telefon:</label>
						<input class="col-12 col-sm-10 form-control" type="text" name="telephone" required>
					</div>
					<div class="col-12 col-md-8 col-lg-6 mb-3 form-inline">
						<label class="col-12 col-sm-2 text-center">Üzenet típusa:</label>
						<select class="col-12 col-sm-10 form-control" type="text" name="category">
							<?php foreach($data['category'] as $category):?>
								<option><?php echo $category->id.' - '.$category->category;?></option>
							<?php endforeach;?>  
						</select>
					</div>
					<label class="col-12 mx-auto text-center" >Üzenet:</label>
					<textarea class="form-control" rows="4" name="message" required></textarea>
					<button class="btn btn-light mt-3 mx-auto text-secondary" type="submit">KÜLDÉS</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-9 col-lg-6 mx-auto">
				<table class="table table-light table-borderless table-striped shadow rounded">
					<tr>
						<td class="text-secondary">Telefon:</td>
						<td>
							<a class="text-info text-decoration-none" href="tel:+36201234567">+36-20/123-45-67</a>
						</td>
					</tr>
					<tr>
						<td class="text-secondary">Email:</td>
						<td>
							<a class="text-info text-decoration-none" href="mailto:capitalm@gmail.com">fitnessgym@gmail.com</a>
						</td>
					</tr>
					<tr>
						<td class="text-secondary">Cím:</td>
						<td>1095 Budapest, Tinódi utca 13.</td>
					</tr>
				</table>
			</div>
			<div class="col-12 col-md-9 col-lg-6 mx-auto">
				<iframe class="col-12 px-0 shadow mb-4 rounded"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.5338974507686!2d19.069254915817623!3d47.4795117047414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dcfed91d2635%3A0x995217cc9ad44475!2sBudapest%2C%20Tin%C3%B3di%20u.%2013%2C%201095%20Hungary!5e0!3m2!1sen!2sro!4v1626784019079!5m2!1sen!2sro" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe></iframe>
            </div>
		</div>
	</div>
</div>
<?php 
	require APPROOT.'/views/includes/footer.php';
?>