<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ressourcerietorcy
 */

get_header();
?>

<body>
<main id="primary" class="site-main">

<div class="name_connexion">
	<p> Vous êtes connecté(e), bienvenue chez Nouvell'R </p>
</div>


<div class="index_slogan">
	<div class="index_slogan_text">
	<h4> TORCY DONNE, TORCY RENVOIE : OFFREZ UNE SECOND VIE</h4>
<!-- 		<br> -->
	<div class="index_slogan_text2">
		<h4>À VOS OBJETS DU QUOTIDIEN ! </h4>
	</div>
	</div>
	
	
</div>

<div class="title1">
	<h3> Nos produits </h3>
</div>

<div class="container_card_product">
	<div class="card_product">
		
		<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/soucoupes_radus.png" alt="soucoupes">
		<p class="card_product_soucoupes"> 4 SOUCOUPES </p>
		<p class="card_product_price"> 0.50€ </p>	
		<a class="btn_reserver" href="#"> Réserver</a>
	</div>

	<div class="card_product">
		
		<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/tasse.png" alt="soucoupes ">
		<p class="card_product_soucoupes"> TASSE MAGNÉTISANTE </p>
		<p class="card_product_price"> 3€ </p>	
		<a class="btn_reserver" href="#"> Réserver</a>
	</div>

	<div class="card_product">
		
		<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/bougie.png" alt=" soucoupes">
		<p class="card_product_soucoupes"> PORTE BOUGIE </p>
		<p class="card_product_price"> 0.50€ </p>	
		<a class="btn_reserver" href="#"> Réserver</a>
	</div>

	<div class="card_product">
		
		<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/litiere.png" alt="soucoupes  ">
		<p class="card_product_soucoupes"> BAC LITIÊRE CHAT </p>
		<p class="card_product_price"> 2€ </p>	
		<a class="btn_reserver" href="#"> Réserver</a>
	</div>


	<div class="card_product">
		
		<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/coquetiers.png" alt="soucoupes  ">
		<p class="card_product_soucoupes"> 6 COQUETIERS </p>
		<p class="card_product_price"> 1€ </p>	
		<a class="btn_reserver" href="#"> Réserver</a>
		
	</div>

	<div class="card_product">
		
		<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/lavage.png" alt="soucoupes  ">
		<p class="card_product_soucoupes"> BOULE DE LAVAGE </p>
		<p class="card_product_price"> 3€ </p>	
		<a class="btn_reserver" href="#"> Réserver</a>
	</div>

</div>

<div class="index_arrow">
	<p> Tout voir </p>
	<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/index_arrow.png" alt="">
</div>


<div class="index_valeur">
	<br>
	<h4> NOS VALEURS </h4>
	<div class="index_valeur_content">
		<div class="index_valeur_content_img">
			<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/help.png" alt="">
			<p> Lorem ipsum</p>
		</div>
		<div class="index_valeur_content_img">
			<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/tri.png" alt="">
			<p> Lorem ipsum</p>
		</div>
		<div class="index_valeur_content_img">
			<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/communication.png" alt="">
			<p> Lorem ipsum</p>
		</div>
	</div>
	
</div>

	





<?php 

?> 

</main>
</body>
	

<?php 

/*  get_sidebar();  */	
get_footer(); 
