<?php
	require_once 'includes/partials/header.php';
	
	$read = new Read;
	$usages = $read->getEntries();
?>
		<div id="container2" class="clearfix">
			<div>
				<h1>OGCMA Database</h1>
				<input class="allSearch" type="text" name="allSearch" placeholder="Search All Usages">
			</div>
			<div>
				<div class="sort">
					<ul class="clearfix">
						<li>A</li>
						<li>B</li>
						<li>C</li>
						<li>D</li>
						<li>E</li>
						<li>F</li>
						<li>G</li>
						<li>H</li>
						<li>I</li>
						<li>J</li>
						<li>K</li>
						<li>L</li>
						<li>M</li>
						<li>N</li>
						<li>O</li>
						<li>P</li>
						<li>Q</li>
						<li>R</li>
						<li>S</li>
						<li>T</li>
						<li>U</li>
						<li>V</li>
						<li>W</li>
						<li>X</li>
						<li>Y</li>
						<li>Z</li>
					</ul>
				</div>
				
				<div class="summary clearfix">
					<div class="table-scroll clearfix">
						<table class="usages">
							<thead class="line2 sum_head">
								<tr>
									<th>Serial #</th>
									<th>Title</th>
									<th class="thead-third">Author</th>
								</tr>
							</thead>
							<tbody class="sum_body">
								<?php
									foreach($usages as $item){
										$case = "summary";
										$item->displayEntries($case);
									};
								?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="divider">
				</div>
				
				<div class= "detailed clearfix">
					<div class="table-scroll clearfix">	
						<table>
							<thead class= "details_head">
								<tr>
									<th></th>
									<th>Details</th>
									<th></th>
								</tr>
							</thead>
							<tbody class="details">
								<!--use $.get to fill this-->
							</tbody>
							
						</table>	
					</div>
				</div>
			</div>
		</div>
<?php
require_once 'includes/partials/footer.php';
