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
?>



<main class="main_produit">



	
	<div class="card_produit">
        <div class="card_produit_content">
            <div class="card_produit_content_img">
                <img src=<?php echo $product_image; ?>
            </div>
            <div class="card_produit_content_texte">
    
                <?php
                echo "<h3>" . esc_html($product_title) . "</h3>";
                echo "<h4>" . get_post_field('post_content', $product_id) . "</h4>";
                echo "<hr class='produit_hr'>";
                echo "<p>" . wc_price($product_price) . "</p>";
                echo "<hr class='produit_hr'>";
                echo "<div class='card_produit_content_texte_liste'>";
                    echo "<ul>";
                        echo "<li> Poids :</li>";
                        echo "<li> État :</li>";
                    echo "</ul>";
                    echo "<ul>";
                        echo "<li>" . esc_html($poids_kg) . " kg</li>";
                        echo "<li>" . esc_html($etat) . "</li>";
                    ?>
                    </ul>
                    </div>
                    
                    <?php
                    $est_reserve = get_field('est_reserve', $product_id);

                    if ($est_reserve == "Non") {
                        echo '<form method="post" class="produit_link">';
                        echo '<input type="hidden" name="product_id" value="' . esc_attr($product_id) . '">';
                        echo '<input type="submit" name="reservation_button" value="Réserver">';
                        echo '</form>';

                        echo "<br><br>";
                    }
                ?>
                
            </div>

                
        </div>

        <div class="card_question">
            <?php
            echo do_shortcode('[contact-form-7 id="754170b" title="Formulaire de contact 1"]');
            ?>
        </div>
        
           
    </div>

      
    
    </main>


<?php
get_footer();
?>
