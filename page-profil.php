<?php
if (!is_user_logged_in()) {
    // L'utilisateur n'est pas connecté
    wp_redirect( 'connexion' );
}

get_header();
$count_products = 0;

    ?>

    <main class="main_profil">
        <div class="title_profil">
            <h1> MON PROFIL</h1>
        </div>

        <div class="compte_title">
            <h4> Mes informations</h4>
        </div>
        <div class="compte_hr">
            <hr>
        </div>
       
        <div class="card_info">
            
            <div class="information_liste">
            <ul>  <h3> Infos de contact</h3>
                <?php
                echo "<li>" . wp_get_current_user()->display_name . "</li>";
                echo "<li>" . wp_get_current_user()->user_email . "</li>";
                ?>
            </ul>

            <ul>  <h3> Adresse de facturation</h3>
                <li>Torcy, 77468</li>
                <li>18 rue d'Anjoux</li>
                <li>France</li>
            </ul>
            </div>
           
           
        </div>

        <div class="compte_title">
        <h4> Mes réservations</h4>
        </div>
        
        <div class="compte_hr">
            <hr>
        </div>
    <?php

    $products = wc_get_products(array(
        'orderby' => 'date',
        'order'   => 'DESC',
    ));

    // Vérifier si des produits ont été trouvés
    if ($products) {
        // Afficher chaque produit séparément
        foreach ($products as $product) {
            // Récupérer les détails du produit
            $product_id    = $product->get_id();
            $product_title = $product->get_name();
            $product_price = $product->get_price();
            $product_image = $product->get_image(); // Récupérer l'URL de l'image du produit

            $reserveur = get_field('reserveur_id', $product_id);

            if ($reserveur == get_current_user_id()) {
                $count_products++;
                // Afficher les détails du produit
                echo "<div class='card_reservation'>";
                echo "<a href=" . esc_url(get_permalink($product_id)) . ">";
                    echo "<div class='card_reservation_content'>";
                        echo "<img src=" . $product_image . "";
                        echo "<div class='card_reservation_content_text1'>";
                            echo "<p>" . esc_html($product_title) . "</p>";
                        echo "</div>";
                        echo "<div class='card_reservation_content_text2'>";
                            echo "<p>" . wc_price($product_price) . "</p>";
                        echo "</div>";
                    echo "</div>";
                    echo '</a>';           
                echo "</div>";
            }
        }
    }
    ?>
    </main>
    <?php
    if ($count_products == 0) {
        echo "<p>Vous n'avez pas encore réservé de produits.</p>";
    }


get_footer();
?>