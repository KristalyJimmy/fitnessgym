<?php
    require APPROOT.'/views/includes/head.php';
?>
<?php
	require APPROOT.'/views/includes/navigation.php';
?>
<div class="card-group col-12 my-3">
  	<div class="col-2">
		<div class="card rounded-lg shadow-sm" id="priceCard1">
			<div class="card-header font-italic"><h5>1. Válassz a különböző bérlet kínálatunkból!</h5></div>
			<div class="card-body">
				<p class="card-text">Mindenkinek megfelelő bérlet opciókat kínálunk így az egy napos belépéstől kezdve akár egész évig tartó bérletet vásárolhatsz! A döntés a tiéd!</p>
			</div>
		</div>
	</div>
  	<div class="col-2">
		<div class="card rounded-lg shadow-sm" id="priceCard2">
			<div class="card-header font-italic"><h5>2. Válassz egy profi edzőt!</h5></div>
			<div class="card-body">
				<p class="card-text">Professzionális tapasztalattal rendelkező edzőink arra vállakoznak, hogy kihozzák belőled a maximumot. Különböző edzéstípusok közül választhatsz, amelyet edzőink egy személyreszabott edzéstervvel ötvöznek!</p>
			</div>
		</div>
	</div>
  	<div class="col-2">
		<div class="card rounded-lg shadow-sm" id="priceCard3">
			<div class="card-header font-italic"><h5>3. Kezdj edzeni Budapest legmenőbb edzőtermében!</h5></div>
			<div class="card-body">
				<p class="card-text">Edzőtermünk jól megközelíthető helyen található, ahol a legkorszerűbb edzőtermi berendezéseket találod, így biztos a fejlődésed sikere!</p>
			</div>
		</div>
	</div>

	<div class="card-group col-6">
		<div class="card shadow-sm rounded-lg"  id="planTypes">
			<div class="card-header">
				<h2 class="text-dark mx-auto col-4"><b>Bérlet típusok</b><h2>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center col-3">Bérlet</th>
							<th class="text-center col-3">Összeg (Ft)</th>
						</tr>
					</thead>
					<?php foreach($data['price'] as $price): ?>
					<tbody>
						<tr>
							<td class="text-center">
								<p><b><?php echo $price->plan;?></b> <?php echo $price->type;?></p>
							</td>
							<td class="text-center">
								<b><?php echo $price->amount;?></b>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>
<div class="container col-12 mx-auto bg-light rounded-top  shadow-sm" id="aboutDiv">
	<div><h1 class="text-monospace text-center py-5">EDZŐINK</h1></div>
	<div class="row row-col-1 row-col-md-3">
		<div class="col mb-4">
			<div class="card h-100">
				<img src="../img/kelemenAniko.jpg" class="card-img-top" alt="...">
				<div class="card-header font-italic">Kelemen Anikó</div>
				<div class="card-body">
					<h5 class="card-title">TRX</h5>
					<p class="card-text">A TRX egy funkcionális tréning eszköz, amely hevederekből és fogókból áll. Állítható a magassága, ezzel pedig a nehézségi fokozata is. A saját testsúlyunkat használva dolgoztat meg bennünket ez a felfüggesztéses módszer így nagyon sok feladat elvégzésére alkalmas. Javítja az állóképességet, a koordinációt, segíti a hajlékonyságot és fejleszti a core izmok stabilitását. A törzstartó izmok az ágyéki gerincszakasz körüli izomhúrok, ez azért nagyon fontos, mert ezen izomcsoportok erősségével javítjuk a testtartásunkat, és figyelni tudunk a gerincoszlop tartására is.</p>
				</div>
				<div class="card-footer font-italic">Elérhetőség: +36303661133</div>
			</div>
		</div>
		<div class="col mb-4">
			<div class="card h-100">
				<img src="../img/wagnerBela.jpg" class="card-img-top" alt="...">
				<div class="card-header font-italic">Wagner Béla</div>
				<div class="card-body">
					<h5 class="card-title">Funkcionális köredzés</h5>
					<p class="card-text">Sokrétű gyakorlat sorozat amely a teljes izomzatot megmozgatja és tökéletes alapokat teremt a későbbi specifikus mozgásoknak.</p>
				</div>
				<div class="card-footer font-italic">Elérhetőség: +36304453400</div>
			</div>
		</div>
		<div class="col mb-4">
			<div class="card h-100">
				<img src="../img/tankoErika.jpg" class="card-img-top" alt="...">
				<div class="card-header font-italic">Tankó Erika</div>
				<div class="card-body">
					<h5 class="card-title">HIIT</h5>
					<p class="card-text">A HIIT, azaz magas intenzitású intervall tréning, amely rövid de robbanásszerűen intenzív szakaszok és rövid pihenők ciklikus ismétlődésén alapuló mozgásforma. A begyorsult ritmus miatt a szervezet könnyebben nyúl a zsírtartalékokhoz, emiatt különösen ajánlott súlyzós edzés mellé, hiszen így nem a nehezen felépített izmaidból veszítesz, hanem a felesleges zsírt égeted el. Mellékhatása, hogy megnövekszik a növekedési hormon a szervezetünkben, ami extra kalóriákat éget és emellett valóban fiatalít.</p>
				</div>
				<div class="card-footer font-italic">Elérhetőség: +36308899493</div>
			</div>
		</div>
		<div class="col mb-4">
			<div class="card h-100">
				<img src="../img/kisTamas.jpg" class="card-img-top" alt="...">
				<div class="card-header font-italic">Kis Tamás</div>
				<div class="card-body">
					<h5 class="card-title">Súlyzós edzés</h5>
					<p class="card-text">Növeli az izomerőt és izomtömeget, tónusosabbá válnak az izmok és nő a nyugalmi alapanyagcsere így hozzájárul az egészséges testsúly megőrzéséhez.</p>
				</div>
				<div class="card-footer font-italic">Elérhetőség: +36304533343</div>
			</div>
		</div>
		<div class="col mb-4">
			<div class="card h-100">
				<img src="../img/elekZoltan.jpg" class="card-img-top" alt="...">
				<div class="card-header font-italic">Elek Zoltán</div>
				<div class="card-body">
					<h5 class="card-title">Kettlebell</h5>
					<p class="card-text">A kettlebell vagy más néven harangsúlyos edzésterv teljeskörű edzést biztosít, erősíti az izmokat, fejleszti az egyensúlyt és megdolgoztatja a szív és érrendszert. Ötvözik a kardió edzést a súlyemeléssel, a statikus mozgást a dinamikussal. Ezzel az egyik leghatékonyabb edzéstípus ami a legtöbbet hozza ki a befektetett időből. Kettlebell gyakorlatok verhetetlenek zsírégetésben, amellett hogy felviszi a pulzust és így segíti a zsírégetést, nagyon kíméletes az izületekkel.</p>
				</div>
				<div class="card-footer font-italic">Elérhetőség: +36304567899</div>
			</div>
		</div>
	</div>
</div>