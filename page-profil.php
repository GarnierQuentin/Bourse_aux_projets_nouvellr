<?php
get_header();


if (is_user_logged_in()) {
    // L'utilisateur est connecté, affichez du contenu réservé aux utilisateurs connectés ici

    echo '<h1>Bienvenue, ' . esc_html(wp_get_current_user()->display_name) . ' !</h1>';


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