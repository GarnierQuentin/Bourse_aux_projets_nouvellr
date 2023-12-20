<?php
if (is_user_logged_in()){
    if (isset($_POST['reservation_button'])) {
        $id_du_post = $_POST['product_id'];
        update_field("est_reserve", "Oui", $id_du_post);
        update_field("reserveur_id", get_current_user_id(), $id_du_post);
        date_default_timezone_set('Europe/Paris');
        update_field("date_reservation", date('Y-m-d H:i:s'), $id_du_post);
        wp_redirect(home_url()); // Nouvelle requête HTTP donc la valeur $_POST['reservation_button'] n'existe plus
        exit();
    }
} else{
    wp_redirect("http://localhost/bap/connexion/");
    exit();
}


get_header();

// Récupérer l'ID du produit actuel
$product_id = get_the_ID();

// Récupérer les détails du produit
$product = wc_get_product($product_id);

// Récupérer les détails du produit
$product_id    = $product->get_id();
$product_title = $product->get_name();
$product_price = $product->get_price();
$product_image = $product->get_image(); // Récupérer l'URL de l'image du produit

// Récupérer les valeurs des champs ACF "États" et "Poids (kg)"
$etat = get_field('etat', $product_id);
$poids_kg = get_field('poids_kg', $product_id);

// Récupérer les catégories liées au produit
$product_categories = wc_get_product_terms($product_id, 'product_cat', array('fields' => 'names'));

// Afficher les détails du produit
echo '<h1>' . esc_html($product_title) . '</h1>';
echo '<p>Prix : ' . wc_price($product_price) . '</p>';
echo '<div class="product-image">' . $product_image . '</div>';

// Afficher les libellés des catégories liées au produit
if (!empty($product_categories)) {
    echo '<p>Catégories : ' . implode(', ', $product_categories) . '</p>';
}

// Afficher les valeurs des champs ACF "États" et "Poids (kg)"
echo '<p>État : ' . esc_html($etat) . '</p>';
echo '<p>Poids (kg) : ' . esc_html($poids_kg) . '</p>';

echo '<p>Date de publication : ' . esc_html(get_the_date()) . '</p>';

echo '<form method="post">';
echo '<input type="hidden" name="product_id" value="' . esc_attr($product_id) . '">';
echo '<input type="submit" name="reservation_button" value="Réserver">';
echo '</form>';

echo "<br><br>";

echo do_shortcode('[contact-form-7 id="754170b" title="Formulaire de contact 1"]');

get_footer();
?>
