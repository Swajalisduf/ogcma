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
				<li>Achelous, see Heracles and Theseus</li>
				<li>Achilles</li>
				<li>AchillesAfterlife</li>
				<li>AchillesDeath</li>
				<li>AchillesInfancy</li>
				<li>AchillesReturn</li>
				<li>AchillesScyros</li>
				<li>AchillesWrath</li>
				<li>Acis, see Galatea</li>
				<li>AcontiusCydippe</li>
				<li>Acrisius, see Danaë</li>
				<li>Actaeon</li>
				<li>Admetus, see Alcestis</li>
				<li>Adonis</li>
				<li>Adrastus, see SevenAgainstThebes</li>
				<li>Aeetes, see JasonGoldenFleece</li>
				<li>Aegeus, see TheseusAthens</li>
				<li>Aegina, see ZeusLoves</li>
				<li>Aegisthus, see Agamemnon</li>
				<li>Aeneas</li>
				<li>AeneasApotheosis</li>
				<li>AeneasFlight</li>
				<li>AeneasLatium</li>
				<li>AeneasShipwreck</li>
				<li>AeneasSicily</li>
				<li>AeneasStorm</li>
				<li>AeneasUnderworld</li>
				<li>AeneasWanderings</li>
				<li>Aeolus</li>
				<li>AesculapiusHygieia</li>
				<li>Aeson, see Medea</li>
				<li>Aethra, see also TheseusTroezen</li>
				<li>Agamemnon</li>
				<li>AgesOfWorld</li>
				<li>Aglaurus, see HerseAglaurus</li>
				<li>Alcestis</li>
				<li>Alcinous, see OdysseusNausicaa</li>
				<li>Alcmaeon, see SevenAgainstThebes</li>
				<li>Alcmene, see AmphitryonAlcmene</li>
				<li>AlcyoneCeyx</li>
				<li>AlphaeusArethusa</li>
				<li>Amaryllis, see ShepherdsShepherdesses</li>
				<li>Amazons</li>
				<li>Amphiaraus, see SevenAgainstThebes</li>
				<li>Amphion</li>
				<li>Amphitrite</li>
				<li>AmphitryonAlcmene</li>
				<li>Andromeda, see PerseusAndromeda</li>
				<li>Antaeus, see HeraclesAntaeus</li>
				<li>Anteros, see ErosAnteros</li>
				<li>Antigone</li>
				<li>Antinous, see OdysseusReturn</li>
				<li>Antiope</li>
				<li>AntiopeDirce</li>
				<li>Aphrodite</li>
				<li>Aphrodite, see AresAphrodite</li>
				<li>AphroditeAnchises</li>
				<li>AphroditeBirth</li>
				<li>AphroditeCythera</li>
				<li>AphroditeGirdle</li>
				<li>AphroditeTannhäuser</li>
				<li>AphroditeVenusFrigida</li>
				<li>AphroditeVenusSatyrs</li>
				<li>AphroditeVenusStatue</li>
				<li>AphroditeVenusWorship</li>
				<li>Apollo</li>
				<li>ApolloCumaeanSibyl</li>
				<li>ApolloLoves</li>
				<li>ApolloPython</li>
				<li>ApolloShepherd</li>
				<li>ApolloSunGod</li>
				<li>Aquillo, see Boreas</li>
				<li>Arachne</li>
				<li>Arcadia</li>
				<li>Ares</li>
				<li>AresAphrodite</li>
				<li>AresAthena</li>
				<li>Arethusa, see AlphaeusArethusa</li>
				<li>Argonauts, see JasonArgonauts</li>
				<li>Argus, see Io and JasonArgonauts</li>
				<li>Ariadne</li>
				<li>Arion</li>
				<li>Aristaeus</li>
				<li>Artemis</li>
				<li>ArtemisEphesus</li>
				<li>AsclepiusHygieia</li>
				<li>Asphodel, see Hades</li>
				<li>Astarte</li>
				<li>Asteria, see ZeusLoves</li>
				<li>Asterion, see Minotaur</li>
				<li>Astyanax, see TrojanWarFall</li>
				<li>Atalanta</li>
				<li>Athena</li>
				<li>Athena, see AresAthena</li>
				<li>AthenaBirth</li>
				<li>AthenaContestPoseidon</li>
				<li>Atlantis</li>
				<li>AtreusThyestes</li>
				<li>Attis</li>
			</ul>
		</div>
	</div>
	</div>
</main>
<?php
require_once 'includes/partials/footer.php';
