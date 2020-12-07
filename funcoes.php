<?php
$host = "localhost";
$user= "root";
$senha = "";
$banco = "facemash";

$con = mysqli_connect($host, $user, $senha,$banco);



if (mysqli_connect_error()) {
  die("Database connection failed: " . mysqli_connect_error());
}

function mostraFoto1(){
global $con;
global $id_foto1;
			 $id_foto1 = rand(1,4);
			 $image_query1 = mysqli_query($con,"select imagemCaminho from ranking where id=$id_foto1");
			 while($rows = mysqli_fetch_array($image_query1))
				 {
				     $img_src1 = $rows['imagemCaminho'];
				 }
	
			 return $img_src1;
}

function mostraFoto2(){
global $con;
global $id_foto2;
			 $id_foto2 = rand(5,7);
			 $image_query2 = mysqli_query($con,"select imagemCaminho from ranking where id=$id_foto2");
			 while($rows = mysqli_fetch_array($image_query2))
				 {
				     $img_src2 = $rows['imagemCaminho'];
				 }

				
			 return $img_src2;
}

function atualiza(){
global $con;

//CALCULOS PARA RA VENCEDOR
if(isset($_GET['escolheu'])):
	if ($_GET['escolheu']==="quadrado1"):
			$ganhou = (int)$_GET['ganhou'];
			$perdeu = (int)$_GET['perdeu'];


			$rating_atual_a = mysqli_query($con,"select rating from ranking where id=$ganhou");
			$rating_atual_b = mysqli_query($con,"select rating from ranking where id=$perdeu");


						 while($rows = mysqli_fetch_array($rating_atual_a))
							 {
							     $ra = $rows['rating'];

							 }
						 while($rows = mysqli_fetch_array($rating_atual_b))
							 {
							     $rb = $rows['rating'];
							     
							 }


			$ra_convertido = (int)$ra;
			$rb_convertido = (int)$rb;




	$expectativa_a= (1.0 / (1.0 + pow(10, (($rb_convertido-$ra_convertido) / 400))));
	$expectativa_b = (1.0 / (1.0 + pow(10, (($ra_convertido-$rb_convertido) / 400))));

	$novo_rating_a_vencedor = $ra_convertido+24*(1-$expectativa_a);
	$novo_rating_b_perdedor = $rb_convertido+24*(0-$expectativa_b);


	$registrar_vencedor = mysqli_query($con,"UPDATE ranking SET rating=$novo_rating_a_vencedor where id=$ganhou;");
	$registrar_perdedor = mysqli_query($con,"UPDATE ranking SET rating=$novo_rating_b_perdedor where id=$perdeu;");

			else:
			//CALCULOS PARA RB VENCEDOR,É O MESMO QUE O RA VENCEDOR,FORMULAS LIGEIRAMENTE DIFERENTES.OBSERVE.
			$ganhou = (int)$_GET['ganhou'];
			$perdeu = (int)$_GET['perdeu'];

			$rating_atual_a = mysqli_query($con,"select rating from ranking where id=$perdeu");
			$rating_atual_b = mysqli_query($con,"select rating from ranking where id=$ganhou");


						 while($rows = mysqli_fetch_array($rating_atual_a))
							 {
							     $ra = $rows['rating'];

							 }
						 while($rows = mysqli_fetch_array($rating_atual_b))
							 {
							     $rb = $rows['rating'];
							     
							 }


			$ra_convertido = (int)$ra;
			$rb_convertido = (int)$rb;


	$expectativa_a= (1.0 / (1.0 + pow(10, (($rb_convertido-$ra_convertido) / 400))));
	$expectativa_b = (1.0 / (1.0 + pow(10, (($ra_convertido-$rb_convertido) / 400))));

	$novo_rating_b_vencedor = $rb_convertido+24*(1-$expectativa_b);
	$novo_rating_a_perdedor = $ra_convertido+24*(0-$expectativa_a);


	$registrar_vencedor = mysqli_query($con,"UPDATE ranking SET rating=$novo_rating_b_vencedor where id=$ganhou;");
	$registrar_perdedor = mysqli_query($con,"UPDATE ranking SET rating=$novo_rating_a_perdedor where id=$perdeu;");
	endif;//fim escolheu==quadrado1
endif;// fim escolheu setado
}//fim funcao

