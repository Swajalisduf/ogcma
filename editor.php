<?php
	require 'includes/partials/header.php';

	$user_id = 27;

	$read = new Read;
	$filename = $read->getFilename($user_id);
	$textfile = Read::getTextContents($filename);

	if(!$textfile){
		exit('There is no textfile to edit');
	}
?>
		<!-- Need to set up CSS so the page is a two column layout with header on left and main on right -->
		<main>
			<h2 id="mode">Edit Mode</h2>
			<section>
				<object data="editor/pdf/<?=$filename;?>.pdf" type="application/pdf">
		   		<p>
		   			This browser does not support PDFs. Please download the PDF to view it: <a href="<?=$filename;?>.pdf">Download PDF</a>.
		   		</p>
				</object>
			</section>
			<section>
				<textarea id="editor">
					<?=$textfile;?>	
				</textarea>
			</section>
		</main>
		<button>Insert Tags</button>
		<aside>
			<h2>Tags Key</h2>
			<div id="qwer">
				<p>Q-W-E-R</p>
				<ul>
					<!-- Need to have the CSS treat every two li as a row -->
				<!-- Row 1 -->
					<li>Tag</li>
					<li>Keys</li>
				<!-- Row 2 -->
					<li>&lt;publication&gt;</li>
					<li>Q</li>
				<!-- Row 3 -->
					<li>&lt;/publication&gt;</li>
					<li>Shift + Q</li>
				<!-- Row 4 -->
					<li>&lt;owning&gt;</li>
					<li>W</li>
				<!-- Row 5 -->
					<li>&lt;/owning&gt;</li>
					<li>Shift + W</li>
				<!-- Row 6 -->
					<li>&lt;creation-date&gt;</li>
					<li>E</li>
				<!-- Row 7 -->
					<li>&lt;/creation-date&gt;</li>
					<li>Shift + E</li>
				<!-- Row 8 -->
					<li>&lt;biliography&gt;</li>
					<li>E</li>
				<!-- Row 9 -->
					<li>&lt;/biliography&gt;</li>
					<li>Shift + E</li>
				</ul>
			</div>

			<div id="asdf">
				<p>A-S-D-F</p>
				<ul>
				<!-- Row 1 -->
					<li>Tag</li>
					<li>Keys</li>
				<!-- Row 2 -->
					<li>&lt;artist-surname&gt;</li>
					<li>A</li>
				<!-- Row 3 -->
					<li>&lt;/artist-surname&gt;</li>
					<li>Shift + A</li>
				<!-- Row 4 -->
					<li>&lt;artist-given&gt;</li>
					<li>S</li>
				<!-- Row 5 -->
					<li>&lt;/artist-given&gt;</li>
					<li>Shift + S</li>
				<!-- Row 6 -->
					<li>&lt;artist-date&gt;</li>
					<li>D</li>
				<!-- Row 7 -->
					<li>&lt;/artist-date&gt;</li>
					<li>Shift + D</li>
				<!-- Row 8 -->
					<li>&lt;title&gt;</li>
					<li>F</li>
				<!-- Row 9 -->
					<li>&lt;/title&gt;</li>
					<li>Shift + F</li>
				</ul>
			</div>

			<div id="zxcv">
				<p>Z-X-C-V</p>
				<ul>
				<!-- Row 1 -->
					<li>Tag</li>
					<li>Keys</li>
				<!-- Row 2 -->
					<li>&lt;additional-artist&gt;</li>
					<li>Z</li>
				<!-- Row 3 -->
					<li>&lt;/additional-artist&gt;</li>
					<li>Shift + Z</li>
				<!-- Row 4 -->
					<li>&lt;medium&gt;</li>
					<li>X</li>
				<!-- Row 5 -->
					<li>&lt;/medium&gt;</li>
					<li>Shift + X</li>
				<!-- Row 6 -->
					<li>&lt;premiere-date&gt;</li>
					<li>C</li>
				<!-- Row 7 -->
					<li>&lt;/premiere-date&gt;</li>
					<li>Shift + C</li>
				<!-- Row 8 -->
					<li>&lt;premiere-venue&gt;</li>
					<li>V</li>
				<!-- Row 9 -->
					<li>&lt;/premiere-venue&gt;</li>
					<li>Shift + V</li>
				</ul>
			</div>
		</aside>
<?php
	require 'includes/partials/footer.php';
?>