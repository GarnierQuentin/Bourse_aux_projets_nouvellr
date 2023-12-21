<?php

function custom_login_process() {
    if (isset($_POST['login_submit'])) {
        $user_email = sanitize_email($_POST['user_email']);
        $password   = $_POST['password'];

        $user = get_user_by('email', $user_email);

        if ($user && wp_check_password($password, $user->user_pass, $user->ID)) {
            // Connexion réussie
            wp_set_auth_cookie($user->ID, true);
            wp_redirect("profil");
        }
    }
}

custom_login_process();

get_header();


    ?>
<main class="main_connexion">
    <div class="card_connexion">
        <div class="card_connexion_content">
            <div class="title_connexion">
                <h1>CONNEXION</h1>
            </div>
            
            <form action="" method="post">

                <div class="login_connexion">
                    <label for="user_email">Adresse e-mail :</label>
                    <input type="email" name="user_email" id="user_email" required>

                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>
                </div>
                

                
                <div class="btn_connexion">
                    <input type="submit" name="login_submit" value="Se connecter">
                </div>

                <div class="text_compte">
                    <a href="inscription">
                        <p> Je n'ai pas de compte, je m'inscris</p>
                    </a>
                </div>
            </form>            
        </div>
    </div>
</main>
<?php

    

get_footer();
?>