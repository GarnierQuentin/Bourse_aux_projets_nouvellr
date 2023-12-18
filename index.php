<?php
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

<form action="index.php" method="get">
	<input type="text" name="s" placeholder="Rechercher un produit">
	<input type="submit" value="Rechercher">
</form>

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

        // Afficher les détails du produit
        echo '<div class="product-image">' . $product_image . '</div>';
        echo '<h2>' . esc_html($product_title) . '</h2>';
        echo '<p>Prix : ' . wc_price($product_price) . '</p>';
        echo '<a href="' . esc_url(get_permalink($product_id)) . '">Voir le produit</a>';
        echo '<hr>';
    }
} else {
    echo 'Aucun produit trouvé.';
}

?>

<?php
get_footer();