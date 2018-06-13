<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once 'includes/partials/header.php';
	
	$read = new Read;
	$usages = $read->getEntries();
?>
	
<!--<main>
	<img class='background-image' src='images/background_top_1300px.png' alt='background'>
	<div>
		<h1>Welcome to the Catalog of all the References</h1>
		<input class="allSearch" type="text" name="allSearch" placeholder="Search All Usages">
	</div> -->

	<div class="wrapper">
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
	<div class="references">
		<div id="A">
			<ul class="clearfix">
				<li><a href="">Achelous</a>, see <a href="">Heracles</a> and <a href="">Theseus</a></li>
				<li><a href="">Achilles</a></li>
				<li><a href="">AchillesAfterlife</a></li>
				<li><a href="">AchillesDeath</a></li>
				<li><a href="">AchillesInfancy</a></li>
				<li><a href="">AchillesReturn</a></li>
				<li><a href="">AchillesScyros</a></li>
				<li><a href="">AchillesWrath</a></li>
				<li><a href="">Acis</a>, see <a href="">Galatea</a></li>
				<li><a href="">AcontiusCydippe</a></li>
				<li><a href="">Acrisius</a>, see <a href="">Danaë</a></li>
				<li><a href="">Actaeon</a></li>
				<li><a href="">Admetus</a>, see <a href="">Alcestis</a></li>
				<li><a href="">Adonis</a></li>
				<li><a href="">Adrastus</a>, see <a href="">SevenAgainstThebes</a></li>
				<li><a href="">Aeetes</a>, see <a href="">JasonGoldenFleece</a></li>
				<li><a href="">Aegeus</a>, see <a href="">TheseusAthens</a></li>
				<li><a href="">Aegina</a>, see <a href="">ZeusLoves</a></li>
				<li><a href="">Aegisthus</a>, see <a href="">Agamemnon</a></li>
				<li><a href="">Aeneas</a></li>
				<li><a href="">AeneasApotheosis</a></li>
				<li><a href="">AeneasFlight</a></li>
				<li><a href="">AeneasLatium</a></li>
				<li><a href="">AeneasShipwreck</a></li>
				<li><a href="">AeneasSicily</a></li>
				<li><a href="">AeneasStorm</a></li>
				<li><a href="">AeneasUnderworld</a></li>
				<li><a href="">AeneasWanderings</a></li>
				<li><a href="">Aeolus</a></li>
				<li><a href="">AesculapiusHygieia</a></li>
				<li><a href="">Aeson</a>, see <a href="">Medea</a></li>
				<li><a href="">Aethra</a>, see also <a href="">TheseusTroezen</a></li>
				<li><a href="">Agamemnon</a></li>
				<li><a href="">AgesOfWorld</a></li>
				<li><a href="">Aglaurus</a>, see <a href="">HerseAglaurus</a></li>
				<li><a href="">Alcestis</a></li>
				<li><a href="">Alcinous</a>, see <a href="">OdysseusNausicaa</a></li>
				<li><a href="">Alcmaeon</a>, see <a href="">SevenAgainstThebes</a></li>
				<li><a href="">Alcmene</a>, see <a href="">AmphitryonAlcmene</a></li>
				<li><a href="">AlcyoneCeyx</a></li>
				<li><a href="">AlphaeusArethusa</a></li>
				<li><a href="">Amaryllis</a>, see <a href="">ShepherdsShepherdesses</a></li>
				<li><a href="">Amazons</a></li>
				<li><a href="">Amphiaraus</a>, see <a href="">SevenAgainstThebes</a></li>
				<li><a href="">Amphion</a></li>
				<li><a href="">Amphitrite</a></li>
				<li><a href="">AmphitryonAlcmene</a></li>
				<li><a href="">Andromeda, see <a href="">PerseusAndromeda</a></li>
				<li><a href="">Antaeus</a>, see <a href="">HeraclesAntaeus</a></li>
				<li><a href="">Anteros</a>, see <a href="">ErosAnteros</a></li>
				<li><a href="">Antigone</a></li>
				<li><a href="">Antinous</a>, see <a href="">OdysseusReturn</a></li>
				<li><a href="">Antiope</a></li>
				<li><a href="">AntiopeDirce</a></li>
				<li><a href="">Aphrodite</a></li>
				<li><a href="">Aphrodite</a>, see <a href="">AresAphrodite</a></li> <!--Ask if this should be combined with the one above--> 
				<li><a href="">AphroditeAnchises</a></li>
				<li><a href="">AphroditeBirth</a></li>
				<li><a href="">AphroditeCythera</a></li>
				<li><a href="">AphroditeGirdle</a></li>
				<li><a href="">AphroditeTannhäuser</a></li>
				<li><a href="">AphroditeVenusFrigida</a></li>
				<li><a href="">AphroditeVenusSatyrs</a></li>
				<li><a href="">AphroditeVenusStatue</a></li>
				<li><a href="">AphroditeVenusWorship</a></li>
				<li><a href="">Apollo</a></li>
				<li><a href="">ApolloCumaeanSibyl</a></li>
				<li><a href="">ApolloLoves</a></li>
				<li><a href="">ApolloPython</a></li>
				<li><a href="">ApolloShepherd</a></li>
				<li><a href="">ApolloSunGod</a></li>
				<li><a href="">Aquillo</a>, see <a href="">Boreas</a></li>
				<li><a href="">Arachne</a></li>
				<li><a href="">Arcadia</a></li>
				<li><a href="">Ares</a></li>
				<li><a href="">AresAphrodite</a></li>
				<li><a href="">AresAthena</a></li>
				<li><a href="">Arethusa</a>, see <a href="">AlphaeusArethusa</a></li>
				<li><a href="">Argonauts</a>, see <a href="">JasonArgonauts</a></li>
				<li><a href="">Argus</a>, see <a href="">Io</a> and <a href="">JasonArgonauts</a></li>
				<li><a href="">Ariadne</a></li>
				<li><a href="">Arion</a></li>
				<li><a href="">Aristaeus</a></li>
				<li><a href="">Artemis</a></li>
				<li><a href="">ArtemisEphesus</a></li>
				<li><a href="">AsclepiusHygieia</a></li>
				<li><a href="">Asphodel</a>, see <a href="">Hades</a></li>
				<li><a href="">Astarte</a></li>
				<li><a href="">Asteria</a>, see <a href="">ZeusLoves</a></li>
				<li><a href="">Asterion</a>, see <a href="">Minotaur</a></li>
				<li><a href="">Astyanax</a>, see <a href="">TrojanWarFall</a></li>
				<li><a href="">Atalanta</a></li>
				<li><a href="">Athena</a></li>
				<li><a href="">Athena</a>, see <a href="">AresAthena</a></li>
				<li><a href="">AthenaBirth</a></li>
				<li><a href="">AthenaContestPoseidon</a></li>
				<li><a href="">Atlantis</a></li>
				<li><a href="">AtreusThyestes</a></li>
				<li><a href="">Attis</a></li>
			</ul>
		</div>
		<div id="B">
			<ul>
				<li><a href="">Bacchanalia</a></li>
				<li><a href="">Bacchus</a>, see <a href="">Dionysus</a></li>
				<li><a href="">Battus</a>, see <a href="">HermesInfancy</a></li>
				<li><a href="">BaucisPhilemon</a></li>
				<li><a href="">Bellerphon</a></li>
				<li><a href="">Boreas</a></li>
				<li><a href="">Briseis</a>, see <a href="">Achilles</a></li>
				<li><a href="">Britomartis</a>, see <a href="">Minos</a></li>
				<li><a href="">ByblisCaunus</a></li>

			</ul>
		</div>
		<div id="C">
			<ul>
				<li>
			</ul>
		<div>
		<div id="D">
			<ul>
				<li>
			</ul>
		<div>
		<div id="E">
			<ul>
				<li>
			</ul>
		<div>
		<div id="F">
			<ul>
				<li>
			</ul>
		<div>
		<div id="G">
			<ul>
				<li>
			</ul>
		<div>
		<div id="H">
			<ul>
				<li>
			</ul>
		<div>
		<div id="I">
			<ul>
				<li>
			</ul>
		<div>
		<div id="J">
			<ul>
				<li>
			</ul>
		<div>
		<div id="K">
			<ul>
				<li>
			</ul>
		<div>
		<div id="L">
			<ul>
				<li>
			</ul>
		<div>
		<div id="M">
			<ul>
				<li>
			</ul>
		<div>
		<div id="N">
			<ul>
				<li>
			</ul>
		<div>
		<div id="O">
			<ul>
				<li>
			</ul>
		<div>
		<div id="P">
			<ul>
				<li>
			</ul>
		<div>
		<div id="Q">
			<ul>
				<li>
			</ul>
		<div>
		<div id="R">
			<ul>
				<li>
			</ul>
		<div>
		<div id="S">
			<ul>
				<li>
			</ul>
		<div>
		<div id="T">
			<ul>
				<li>
			</ul>
		<div>
		<div id="U">
			<ul>
				<li>
			</ul>
		<div>
		<div id="V">
			<ul>
				<li>
			</ul>
		<div>
		<div id="W">
			<ul>
				<li>
			</ul>
		<div>
		<div id="X">
			<ul>
				<li>
			</ul>
		<div>
		<div id="Y">
			<ul>
				<li>
			</ul>
		<div>
		<div id="Z">
			<ul>
				<li>
			</ul>
		<div>
	</div>
	</div>
</main>
<?php
require_once 'includes/partials/footer.php';
