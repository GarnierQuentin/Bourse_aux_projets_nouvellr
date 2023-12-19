<?php
get_header();


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