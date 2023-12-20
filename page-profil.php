<?php
get_header();
$count_products = 0;


if (is_user_logged_in()) {
    // L'utilisateur est connecté, affichez du contenu réservé aux utilisateurs connectés ici
    ?>

    <h1>MON PROFIL</h1>
    <h3> Mes informations</h3>

    <div class="informations">
        <div class="infos_de_contact">
            <?php
            echo "<div class='user_name'>" . wp_get_current_user()->display_name . "</div>";
            echo "<div class='user_mail'>" . wp_get_current_user()->user_email . "</div>";
            ?>
        </div>
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
                echo '<div class="product-image">' . $product_image . '</div>';
                echo '<h2>' . esc_html($product_title) . '</h2>';
                echo '<p>Prix : ' . wc_price($product_price) . '</p>';
            }
        }
    }
    if ($count_products == 0) {
        echo "<p>Vous n'avez pas encore réservé de produits.</p>";
    }
} else {
    // L'utilisateur n'est pas connecté, affichez un message ou le formulaire de connexion ici
    ?>
    <body>
        <div>
            <p>Veuillez vous connecter ou créer un compte pour accéder au contenu réservé aux utilisateurs connectés.</p>
        </div>
        <div>
            <button>
                <a href="connexion">Se connecter</a>
            </button>

            <button>
                <a href="inscription">S'inscrire</a>
            </button>
        </div>
    </body>
    <?php
}



get_footer();
?>