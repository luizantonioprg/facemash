
<?php
	include_once('funcoes.php');


	mostraFoto1();
	mostraFoto2();

?>
<!DOCTYPE html>
<html>
<head>
	<title>FACEMASH</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<link href="estilo/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
		<h1>FACEMASH</h1>
	</header>

	<main>
		<h4>Were we let in for our looks? No. Will we be judged on them? Yes.</h4>
		<h2>Who's Hotter? Click to choose.</h2>

		<div class="divDasFotos">
			<div class="foto1">
				<a href="index.php?escolheu=quadrado1&ganhou=<?php echo $id_foto1 ?>&perdeu=<?php echo $id_foto2?>">
					<img src="images/<?php echo $id_foto1 ?>.png">
			    </a>
			</div>
				
			<span>OR</span>


			<div class="foto2">
				<a href="index.php?escolheu=quadrado2&ganhou=<?php echo $id_foto2 ?>&perdeu=<?php echo $id_foto1?>">
					<img src="images/<?php echo $id_foto2 ?>.png">
			    </a>
			</div>
		</div>
	</main>

	<div class="subfooter">
		<a class="aComPadding" href="">ADAMS</a>
		<a class="aComPadding" href="">CABOT</a>
		<a class="aComPadding" href="">DUNSTER</a>
		<a class="aComPadding" href="">ELIOT</a>
		<a class="aComPadding" href="">KIRKLAND</a>
		<a class="aComPadding" href="">LEVERETT</a>
		<a class="aComPadding" href="">LOWELL</a>
		<a class="aComPadding" href="">MATHER</a>
		<a class="aComPadding" href="">AFFORD</a>
		<a class="aComPadding" href="">RANDOM</a>
	</div>
	<footer>
		<h5>About</h5>
		<h5>Submit</h5>
		<h5>Rankings</h5>
		<h5>Previous</h5>
	</footer>
	
<?php atualiza() ?>
</body>
</html>