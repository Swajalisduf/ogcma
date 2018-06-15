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
				<li><a href="">Aphrodite</a></li> Keep this duplicate?
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
				<li><a href="">Cadmus</a></li>
				<li><a href="">Caenis</a>, see <a href="">PoseidonLoves</a></li>
				<li><a href="">Calais</a>, see <a href="">Boreas</a></li>
				<li><a href="">Calchas</a>, see <a href="">Achilles</a></li>
				<li><a href="">Calliope</a>, see <a href="">MusesPoetryCalliope</a></li>
				<li><a href="">Callisto</a></li>
				<li><a href="">CalydonianBoarHunt</a>, see <a href="">MeleagerCalydonianBoar</a></li>
				<li><a href="">Calypso</a>, see <a href="">OdysseusCalypso</a></li>
				<li><a href="">Camilla</a>, see <a href="">AeneasLatium</a></li>
				<li><a href="">Canace</a></li>
				<li><a href="">Cassandra</a></li>
				<li><a href="">Castor</a>, see <a href="">Dioscuri</a></li>
				<li><a href="">Casus</a>, see <a href="">HeraclesCacus</a></li>
				<li><a href="">Caunus</a>, see <a href="">ByblisCaunus</a></li>
				<li><a href="">Cecrops</a>, see <a href="">Erichthonius</a></li>
				<li><a href="">Centaurs</a></li>
				<li><a href="">CephalusProcris</a></li>
				<li><a href="">Cerberus</a>, see <a href="">HeraclesCerberus</a></li>
				<li><a href="">Ceres</a></li>
				<li><a href="">Ceyx</a>, see <a href="">AlcyoneCeyxhariclea</a></li>
				<li><a href="">Chariclea</a>, see <a href="">TheagenesC</a></li>
				<li><a href="">Charon</a>, see <a href="">Hades</a></li>
				<li><a href="">Chimaera</a></li>
				<li><a href="">Chione</a>, see <a href="">ApolloLoves</a></li>
				<li><a href="">Chiron</a></li>
				<li><a href="">Chloe</a>, see <a href="">DaphnisChloe</a></li>
				<li><a href="">Chloris</a>, see <a href="">Flora</a></li>
				<li><a href="">Chrysaor</a>, see <a href="">Medusa</a></li>
				<li><a href="">Chryseis</a></li>
				<li><a href="">Cinyras</a>, see <a href="">Myrrha</a></li>
				<li><a href="">Circe</a></li>
				<li><a href="">Clio</a>, see <a href="">MusesHistoryClio</a></li>
				<li><a href="">Clymene</a>, see <a href="">ApolloLoves</a></li>
				<li><a href="">Clytemnestra</a>, see <a href="">Agamemnon</a></li>
				<li><a href="">Clytie</a></li>
				<li><a href="">Comus</a></li>
				<li><a href="">Coronis</a>, see <a href="">ApolloLoves</a> or <a href="">PoseidonLoves</a></li>
				<li><a href="">Corydon</a>, see <a href="">ShepherdsShepherdesses</a></li>
				<li><a href="">Creon</a>, see <a href="">Antigone</a> or <a href="">Oedipus</a> or <a href="">SevenAgainstThebes</a></li>
				<li><a href="">Cresphontes</a>, see <a href="">Merope</a></li>
				<li><a href="">Cressida</a>, see <a href="">TroilusCressida</a></li>
				<li><a href="">Creusa</a>, see <a href="">CreusaIon</a> or <a href="">AeneasFlight</a></li>
				<li><a href="">Cronus</a></li>
				<li><a href="">CronusOlympiansBirth</a></li>
				<li><a href="">Cumaean Sibyl</a>, see <a href="">ApolloCumaeanSibyl</a></li>
				<li><a href="">Cupid</a>, see <a href="">Eros</a></li>
				<li><a href="">Cybele</a></li>
				<li><a href="">Cyclopes</a></li>
				<li><a href="">Cydippe</a>, see <a href="">AcontiusCydippe</a></li>
				<li><a href="">Cynthia</a>, see <a href="">Artemis</a></li>
				<li><a href="">Cyparissus</a></li>
				<li><a href="">Cythera</a>, see <a href="">AphroditeCythera</a></li>
			</ul>
		<div>
		<div id="D">
			<ul>
				<li><a href="">Daedalus</a>, see <a href="">IcarusDaedalus</a></li>
				<li><a href="">Damon</a>, see <a href="">ShepherdsShepherdesses</a></li>
				<li><a href="">Danaë</a></li>
				<li><a href="">Danaids</a></li>
				<li><a href="">Daphne</a></li>
				<li><a href="">DaphnisChloe</a></li>
				<li><a href="">Deidamia</a>, see <a href="">AchillesScyros</a></li>
				<li><a href="">Demeter</a></li>
				<li><a href="">Demophon</a></li>
				<li><a href="">Deneira</a>, see <a href="">HeraclesDeneira</a></li>
				<li><a href="">DeucalionPyrrha</a></li>
				<li><a href="">Dido</a></li>
				<li><a href="">Dido</a></li> Keep this duplicate?
				<li><a href="">Diomedes</a></li>
				<li><a href="">Dionysus</a></li>
				<li><a href="">DionysusAriadne</a></li>
				<li><a href="">DionysusInfancy</a></li>
				<li><a href="">DionysusPirates</a></li>
				<li><a href="">Dioscuri</a></li>
			</ul>
		<div>
		<div id="E">
			<ul>
				<li><a href="">Echo, see <a href="">Narcissus</a></li>
				<li><a href="">Electra</a></li>
				<li><a href="">ElectraPleiad</a></li>
				<li><a href="">Elysium</a></li>
				<li><a href="">Encaldus</a></li>
				<li><a href="">Endymion</a></li>
				<li><a href="">Eos</a></li>
				<li><a href="">EosTithonus</a></li>
				<li><a href="">Ephesus, Widow of</a>, see <a href="">EphesusWidow</a></li> Should I just connect these?
				<li><a href="">Epimetheus</a>, see <a href="">Pandora</a></li>
				<li><a href="">Erato</a>, see <a href="">MusesPoetryErato</a></li>
				<li><a href="">Erichthonius</a></li>
				<li><a href="">Erigone</a></li>
				<li><a href="">Erinyes</a>, see <a href="">Furies</a></li>
				<li><a href="">Eriphyle</a></li>
				<li><a href="">Eros</a></li>
				<li><a href="">ErosAnteros</a></li>
				<li><a href="">ErosBee</a></li>
				<li><a href="">ErosEducation</a></li>
				<li><a href="">ErosPunishment</a></li>
				<li><a href="">ErosTriumphant</a></li>
				<li><a href="">Eteocles</a>, see <a href="">SevenAgainstThebes</a></li>
				<li><a href="">Europa</a></li>
				<li><a href="">Euryalus</a>, see <a href="">AeneasLatium</a></li>
				<li><a href="">Eurydice</a>, see <a href="">OrpheusEurydice</a></li>
				<li><a href="">Eurystheus</a>, see <a href="">HeraclesBirth</a></li>
				<li><a href="">Eurytion</a></li>
				<li><a href="">Euterpe</a>, see <a href="">MusesPoetryEuterpe</a></li>
				<li><a href="">Evadne</a>, see <a href="">ApolloLoves</a></li>
				<li><a href="">Evander</a>, see <a href="">AeneasLatium</a></li>
			</ul>
		<div>
		<div id="F">
			<ul>
				<li><a href="">Fates</a></li>
				<li><a href="">Fauns</a>, see <a href="">SatyrsFauns</a></li>
				<li><a href="">Fauns</a>, see <a href="">SatyrsFauns</a></li> Keep this duplicate?
				<li><a href="">Faunus</a>, see <a href="">Pan</a></li>
				<li><a href="">Feast of the Gods</a>, see <a href="">GodsGoddesses</a></li>
				<li><a href="">Flora</a></li>
				<li><a href="">FloraZephyr</a></li>
			</ul>
		<div>
		<div id="G">
			<ul>
				<li><a href="">Galatea</a>, see also <a href="">Pygmalion</a> or <a href="">Acis</a></li>
				<li><a href="">Ganymede</a></li>
				<li><a href="">Ge</a>, see <a href="">Gaia</a></li>
				<li><a href="">Giants</a>, see <a href="">TitansGiants</a></li>
				<li><a href="">Glauce</a>, see <a href="">Medea</a></li>
				<li><a href="">Glaucus</a></li>
				<li><a href="">GodsGoddesses</a></li>
				<li><a href="">GodsGoddessesConflictVice&Virtue</a></li>
				<li><a href="">GodsGoddessesElements</a></li>
				<li><a href="">GodsGoddessesLoves</a></li>
				<li><a href="">GodsGoddessesSeasons</a></li>
				<li><a href="">Gorgon</a>, see <a href="">Medusa</a></li>
				<li><a href="">Graces</a></li>
				<li><a href="">Graiae</a>, see <a href="">PerseusMedusa</a></li>
			</ul>
		<div>
		<div id="H">
			<ul>
				<li><a href="">Hades</a></li>
				<li><a href="">Hades (son of Cronus)</a></li>
				<li><a href="">Hades</a>, see either <a href="">Hades (son of Cronus)</a> or <a href="">Hades</a></li> Why the seperate Hades?
				<li><a href="">Harmonia</a>, see <a href="">Cadmus</a></li>
				<li><a href="">Harpies</a></li>
				<li><a href="">Hebe</a></li>
				<li><a href="">Hecate</a></li>
				<li><a href="">Hecatoncheires</a>, see <a href="">TitansGiants</a></li>
				<li><a href="">Hector</a></li>
				<li><a href="">HectorDeath</a></li>
				<li><a href="">Hecuba</a>, see <a href="">TrojanWarFall</a></li>
				<li><a href="">Helen [of Troy]</a></li>
				<li><a href="">Helenus</a>, see <a href="">AeneasWanderings</a></li>
				<li><a href="">Helios</a>, see <a href="">ApolloSunGod</a></li>
				<li><a href="">Helle</a>, see <a href="">AthamasIno</a></li>
				<li><a href="">Hephaestus</a></li>
				<li><a href="">Hera</a></li>
				<li><a href="">HeracleCacus</a></li>
				<li><a href="">Heracles</a></li>
				<li><a href="">HeraclesAntaeus</a></li>
				<li><a href="">HeraclesApotheosis</a></li>
				<li><a href="">HeraclesBirth</a></li>
				<li><a href="">HeraclesChoice</a></li>
				<li><a href="">HeraclesDeath</a></li>
				<li><a href="">HeraclesDeianeira</a></li>
				<li><a href="">HeraclesInfancy</a></li>
				<li><a href="">HeraclesIole</a></li>
				<li><a href="">HeraclesLabors</a></li>
				<li><a href="">HeraclesLaborsAugeanStables</a></li>
				<li><a href="">HeraclesLaborsCerberus</a></li>
				<li><a href="">HeraclesLaborsCeryneianHind</a></li>
				<li><a href="">HeraclesLaborsCretanBull</a></li>
				<li><a href="">HeraclesLaborsDiomedesMares</a></li>
				<li><a href="">HeraclesLaborsErymanthianBoar</a></li>
				<li><a href="">HeraclesLaborsGeryonCattle</a></li>
				<li><a href="">HeraclesLaborsHesperidesApples</a></li>
				<li><a href="">HeraclesLaborsHippolytaGirdle</a></li>
				<li><a href="">HeraclesLaborsLernaeanHydra</a></li>
				<li><a href="">HeraclesLaborsNemeanLion</a></li>
				<li><a href="">HeraclesLaborsStymphalianBirds</a></li>
				<li><a href="">HeraclesMadness</a></li>
				<li><a href="">HeraclesOmphale</a></li>
				<li><a href="">HeraclesPillars</a></li>
				<li><a href="">Hermaphroditus</a></li>
				<li><a href="">Hermes</a></li>
				<li><a href="">HermesInfancy</a></li>
				<li><a href="">HeroLeander</a></li>
				<li><a href="">HerseAglaurus</a></li>
				<li><a href="">Hesione</a>, see <a href="">Laomedon</a></li>
				<li><a href="">Hesperides</a></li>
				<li><a href="">Hesperus</a></li>
				<li><a href="">Hestia</a></li>
				<li><a href="">Hipomenes</a>, see <a href="">Atalanta</a></li>
				<li><a href="">Hippodamia</a>, see <a href="">PirithousHippodamia</a></li>
				<li><a href="">Hippodamia</a>, see <a href="">PirithousWedding</a></li> Add this to the one above?
				<li><a href="">Hippolyta</a>, see <a href="">Amazons or <a href="">HeraclesHippolytaGirdle</a></li>
				<li><a href="">Hippolytus</a>, see <a href="">PhaedraHippolytus</a></li>
				<li><a href="">Hyacinth</a></li>
				<li><a href="">Hygieia</a>, see <a href="">AsclepiusHygieia</a></li> 
				<li><a href="">Hygieia</a>, see <a href="">AsclepiusHygieia</a></li>Keep this duplicate?
				<li><a href="">Hylas</a>, see <a href="">JasonHylas</a></li>
				<li><a href="">Hylomene</a></li>
				<li><a href="">Hymen</a></li>
				<li><a href="">Hyperion</a></li>
				<li><a href="">Hypermnestra</a>, see <a href="">Danaids</a></li>
				<li><a href="">Hypsipyle</a>, see <a href="">JasonHypsipyle</a></li>
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
