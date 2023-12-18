<?php





function custom_login_process() {
    if (isset($_POST['login_submit'])) {
        $user_email = sanitize_email($_POST['user_email']);
        $password   = $_POST['password'];

        $user = get_user_by('email', $user_email);

        if ($user && wp_check_password($password, $user->user_pass, $user->ID)) {
            // Connexion réussie
            wp_set_auth_cookie($user->ID, true);
            echo '<p class="success-message">Connexion réussie.</p>';
        } else {
            // Échec de la connexion
            echo '<p class="error-message">Adresse e-mail ou mot de passe incorrect.</p>';
        }
    }
}

custom_login_process();

get_header();

if (is_user_logged_in()){
    echo '<p>Bienvenue, ' . esc_html(wp_get_current_user()->display_name) . '!</p>';
}
else{
    ?>
    <h2>Connexion</h2>
    <form method="post" action="">
        <label for="user_email">Adresse e-mail :</label>
        <input type="email" name="user_email" id="user_email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" name="login_submit" value="Se connecter">
    </form>
    <?php
}

get_footer();
?>