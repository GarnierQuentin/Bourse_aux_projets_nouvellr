<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ressourcerietorcy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">


	<header id="masthead" class="site-header">
		<div class="bandeau_header">
			<p> Menu déroulant </p>
		</div>
		<div class="site-branding">
		<nav class="header_nav">
			<div class="logo_responsive">
				<div class="logo_n">
				<img  src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/logo_last_nouvellr.png" alt="logo Nouvell'R">
				</div>
				<div class="menu_deroulant_index">
					<img src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/menu_header.png" alt="menu déroulant">
						<ul class="sous-menu">
							<li><a href="#"> Mes réservations</a></li>
							<li><a href="#"> Me connecter</a></li>
							<li><a href="#"> Page admin</a></li>
						</ul>
				</div>
			</div>
			
			<form class="form_recherche" action="">
				<label for="recherche_produit">	</label>
				<input type="text" placeholder="Rechercher un produit ">
				<img class="logo_loop" src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/loop.png" alt="logo loop">
				
			</form>

			<div class="logo_header">
			<img  src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/shoop.png" alt="logo shop">
				<h3 > MES RÉSERVATIONS</h3>
			</div>
			
	
			<div class="logo_header">
			<img  src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/logo_connexion_header.png" alt="logo profil">
			<h3> ME CONNECTER/M'INSCRIRE</h3>
			</div>

			<div class="logo_header">
			<img  src="http://ressourcerie-torcy.test/wp-content/uploads/2023/12/logo_admin.png" alt="logo admin">
			<h3> PAGE ADMINISTRATEUR</h3>
			</div>
			
		</nav>
			 <?php 
			
			/* if ( is_front_page() && is_home() ) :
				?>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif; */
				/* $ressourcerietorcy_description = get_bloginfo( 'description', 'display' );
				if ( $ressourcerietorcy_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $ressourcerietorcy_description;  ?></p>
			<?php endif; ?>
		</div> */

		/*== <nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ressourcerietorcy' ); ?></button>
			<?php */
			/* wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			); */
			?>
		
	</header><!-- #masthead -->
