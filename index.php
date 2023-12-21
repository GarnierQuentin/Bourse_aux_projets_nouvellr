<body>
<main id="primary" class="site-main">

<?php
if (isset($_POST['reservation_button'])){
    if (is_user_logged_in()) {
        ?>
        <div class="name_connexion">
            <p> Vous êtes connecté(e), bienvenue chez Nouvell'R </p>
        </div>
        <?php
        $id_du_post = $_POST['product_id'];
        update_field("est_reserve", "Oui", $id_du_post);
        update_field("reserveur_id", get_current_user_id(), $id_du_post);
        date_default_timezone_set('Europe/Paris');
        update_field("date_reservation", date('Y-m-d H:i:s'), $id_du_post);
        wp_redirect(home_url()); // Nouvelle requête HTTP donc la valeur $_POST['reservation_button'] n'existe plus
        exit();
    }
    else{
        wp_redirect("http://localhost/bap/connexion/");
        exit();
    }
}

get_header();

// Récupérer la valeur de recherche
$search_query = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

$like_search_query = $search_query;

// Récupérer tous les produits WooCommerce qui correspondent à la recherche
$products = wc_get_products(array(
    'orderby' => 'date',
    'order'   => 'DESC',
    's'       => $like_search_query, // Utiliser le paramètre 's' pour la recherche
));

?>


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

<?php

// Vérifier si des produits ont été trouvés
if ($products) {
    // Afficher chaque produit séparément
    foreach ($products as $product) {
        // Récupérer les détails du produit
        $product_id    = $product->get_id();
        $product_title = $product->get_name();
        $product_price = $product->get_price();
        $product_image = $product->get_image(); // Récupérer l'URL de l'image du produit

        $est_reserve = get_field('est_reserve', $product_id);

        if ($est_reserve == "Non") {
            // Afficher les détails du produit
            echo "<div class='card_product'>";
            echo '<a href="' . esc_url(get_permalink($product_id)) . '">';
            echo $product_image;
            echo "<p class='card_product_soucoupes'>" . esc_html($product_title) . "</p>";
            echo "<p class='card_product_price'>" . wc_price($product_price) . "</p>";	
            echo '<form method="post" class="btn_reserver">';
            echo '<input type="hidden" name="product_id" value="' . esc_attr($product_id) . '">';
            echo '<input type="submit" name="reservation_button" value="Réserver">';
            echo '</form>';
            echo '</a>';
            echo "</div>";
        }
    }
} else {
    echo 'Aucun produit trouvé.';
}

?>


</div>


<div class="index_valeur">
	<br>
	<h4> NOS VALEURS </h4>
	<div class="index_valeur_content">
		<div class="index_valeur_content_img">
			<img src="http://bap.test/wp-content/uploads/2023/12/help.png" alt="">
			<p> Lorem ipsum</p>
		</div>
		<div class="index_valeur_content_img">
			<img src="http://bap.test/wp-content/uploads/2023/12/tri.png" alt="">
			<p> Lorem ipsum</p>
		</div>
		<div class="index_valeur_content_img">
			<img src="http://bap.test/wp-content/uploads/2023/12/communication.png" alt="">
			<p> Lorem ipsum</p>
		</div>
	</div>
	
</div>

	





<?php 

?> 

</main>
</body>



<?php
get_footer();