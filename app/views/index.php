<?php
    require APPROOT.'/views/includes/head.php';
?>
<?php
	require APPROOT.'/views/includes/navigation.php';
?>
<div class="container">
	<div class="row">
		<div id="myCarousel" class="carousel slide my-4" data-ride="carousel">
			<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner rounded-lg shadow-lg">
			<div class="carousel-item active">
				<img src="img/firstCarousel.jpg" class="d-block w-100" alt="gym1">
				<div class="carousel-caption d-none d-md-block">
				<h5>Nyitva vagyunk!</h5>
				<p>Gyere és látogass el Budapest újonnan nyílt edzőtermébe!</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="img/secondCarousel.jpg" class="d-block w-100" alt="gym2">
				<div class="carousel-caption d-none d-md-block">
				<h5>Válassz edzőt!</h5>
				<p>Lehetőséged van a város legjobb edzői közül valasztani!</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="img/thirdCarousel.jpg" class="d-block w-100" alt="gym3">
				<div class="carousel-caption d-none d-md-block">
				<h5>Válassz bérletet kedvedre!</h5>
				<p>Edzőtermünkben mindenki megtalálja a számára legalkalmasabb bérlet típust!</p>
				</div>
			</div>
			</div>
			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>