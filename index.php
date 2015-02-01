<head>
	<title>Tivine Technologies</title>
	<link rel="stylesheet" media="screen and (min-width: 1700px)" href="tivine.css">
    <link rel="stylesheet" media="screen and (max-width: 1700px)" href="smallscreen.css">
    <link rel="stylesheet" media="screen and (max-width: 1470px)" href="littlescreen.css">
	<meta charset="utf-8">
</head>
<body>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<div id="bande_horizontale">
		<center><a class="text">TiVine Technologies</a></center>
	</div>
	<div id="main">
	<?php   require_once('show.php'); 
			require_once('function.php'); 
			require_once('programs.php'); 
			session_start();
	?>
		<form method="post" action="">
			<input type="image" src="./images/tf1.png" value="1" alt="submit" name="chaine" id="tf1">
			<input type="image" src="./images/france2.png" value="2" alt ="submit" name="chaine" id="France2">
			<input type="image" src="./images/france3.png" value="3" alt="submit" name= "chaine" id="France3">
			<input type="image" src="./images/canalplus.png" value="4" alt="submit" name= "chaine" id="canalplus">
			<input type="image" src="./images/france5.png" value="5" alt="submit" name= "chaine" id="France5">
			<input type="image" src="./images/m6.png" value="6" alt="submit" name= "chaine" id="M6">
			<input type="image" src="./images/arte.png" value="7" alt="submit" name= "chaine" id="arte">
			<input type="image" src="./images/d8.png" value="8" alt="submit" name= "chaine" id="d8">
			<input type="image" src="./images/w9.png" value="9" alt="submit" name= "chaine" id="w9">
			<input type="image" src="./images/tmc.png" value="10" alt = "submit" name= "chaine" id="tmc">
			<input type="image" src="./images/nt1.png" value="11"alt = "submit" name= "chaine" id="nt1">
			<input type="image" src="./images/nrj12.png" value="12" alt = "submit" name= "chaine" id="nrj12">
			<input type="image" src="./images/lcp.png" value="13" alt = "submit" name= "chaine" id="lcp">
			<input type="image" src="./images/france4.png" value="14" alt = "submit" name= "chaine" id="France4">
			<input type="image" src="./images/bfmtv.png" value="15" alt = "submit" name= "chaine" id="bfm">
			<input type="image" src="./images/itele.png" value="16" alt = "submit" name= "chaine" id="itele">
			<input type="image" src="./images/d17.png" value="17" alt = "submit" name= "chaine" id="d17">
			<input type="image" src="./images/gulli.png" value="18" alt = "submit" name= "chaine" id="gulli">
			<input type="image" src="./images/franceo.png" value="19" alt = "submit" name= "chaine" id="Franceo">
			<input type="image" src="./images/hd1.png" value="20" alt = "submit" name= "chaine" id="hd1">
			<input type="image" src="./images/equipe.png" value="21" alt = "submit" name= "chaine" id="lequipe">
			<input type="image" src="./images/6ter.png" value="22" alt = "submit" name= "chaine" id="ter">
			<input type="image" src="./images/numero23.png" value="23" alt = "submit" name= "chaine" id="numero">
			<input type="image" src="./images/rmc.png" value="24" alt = "submit" name= "chaine" id="rmc">
			<input type="image" src="./images/cherie.png" value="25" alt = "submit" name= "chaine" id="cherie">
			<input type="image" src="./images/rtl9.png" value="26" alt = "submit" name= "chaine" id="rtl9">
			<input type="image" src="./images/ab1.png" value="27" alt = "submit" name= "chaine" id="ab1">
			<input type="image" src="./images/tv5monde.png" value="28" alt = "submit" name= "chaine" id="tv5monde">
			<input type="image" src="./images/paramount.png" value="29" alt = "submit" name= "chaine" id="paramount">
			<input type="image" src="./images/parispremiere.png" value="30" alt = "submit" name= "chaine" id="parispremiere">
			<input type="image" src="./images/canalpluscinema.png" value="31" alt = "submit" name= "chaine" id="canalpluscinema">
			<input type="image" src="./images/canalplussport.png" value="32" alt = "submit" name= "chaine" id="canalplussport">
			<input type="image" src="./images/canalplusfamily.png" value="33" alt = "submit" name= "chaine" id="canalplusfamily">
			<input type="image" src="./images/canalplusdecale.png" value="34" alt = "submit" name= "chaine" id="canalplusdecale">
			<input type="image" src="./images/beinsport1.png" value="35" alt = "submit" name= "chaine" id="bein1">
			<input type="image" src="./images/beinsport2.png" value="36" alt = "submit" name= "chaine" id="bein2">
		</form>
		<div id="cadre">
			<div id="title">
				<?php
					if (isset($_POST['chaine'])) {
						$arr = [];
						$arr['chaine'] = $_POST['chaine'];
						file_put_contents("chaine.json", json_encode($arr));
						$prog = get_program($_POST['chaine']);
						echo "<a class='text'>";
						echo $prog['Title'];
						echo "</a>";
					}
				?>
			</div>
			<div id="top">
				<div id="select">
					<center><a>Selectionnez<br/> une <br/> chaine</a></center>
				</div>
			<?php
				if (isset($_POST['chaine'])) {
					echo "<script type='text/javascript'> $('#select').remove() </script>";
					$now = my_date();
					echo "<script type='text/javascript' src='refresh.js'></script>";
					if (intval($now) <= intval($prog['End']))
					{
						echo "<script type='text/javascript'>load_php(); setInterval(function () {load_php ();}, 30000);</script>";
					}
			}
			?>
			</div>
		</div>
</body>