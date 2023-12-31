<?php
$id_pris = false;
$email_pris = false;

if (isset($_POST['id']) && isset($_POST['mot_de_passe']) && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom'])) {
    if ($_POST['id'] != '' && $_POST['mot_de_passe'] != '' && $_POST['email'] != '' && $_POST['prenom'] != '' && $_POST['nom'] != '') {
        if (username_exists($_POST['id'])) {
            // L'ID est déjà pris
            $id_pris = true;

        } else if (email_exists($_POST['email'])) {
            // L'adresse e-mail est déjà prise
            $email_pris = true;

        } else {
            // L'ID est disponible

            $user_data = array(
                'user_login'    => $_POST['id'],
                'user_pass'     => $_POST['mot_de_passe'],
                'user_email'    => $_POST['email'],
                'first_name'    => $_POST['prenom'],
                'last_name'     => $_POST['nom'],
            );

            $insert_user = wp_insert_user($user_data);

            $user_id = $insert_user;

            add_role('client', 'Client', array());
            
            $user = new WP_User($user_id);
            $user->set_role('client');

            $user_email = sanitize_email($_POST['email']);
            $user = get_user_by('email', $user_email);
            wp_set_auth_cookie($user->ID, true);
            wp_redirect("profil");
        }
    } else {
        // Afficher un message d'erreur si les champs requis ne sont pas remplis
        echo 'Erreur : Veuillez remplir tous les champs requis.';
    }
}else{
    echo 'Je ne reçois pas les données';
}

get_header();

?>


<main>
        <div class="card_inscription">
            
            <div class="card_inscription_content">
                <div class="card_inscription_content_title">
                    <h3> Déjà inscrit ? </h3>
                    <h3><a href="connexion">Connectez-vous ici</a></h3>
                </div>
               
                <div class="title_inscription">
                    <h1> INSCRIPTION</h1>
                </div>
                <div class="card_inscription_content_form">

                    <form action="" method="post">
                        <?php
                        if ($id_pris == true) {
                            echo "<br>";
                            echo "L'ID est déjà pris par un autre utilisateur.";
                        }
                        ?>
                        <input type="text" name="id" placeholder="Identifiant" required>

                        <div class="form_name">

                            <input type="text" name="prenom" placeholder="Prénom" required>

                            <input type="text" name="nom" placeholder="Nom" required>

                        </div>

                        <?php
                        if ($email_pris == true) {
                            echo "<br>";
                            echo "L'adresse e-mail est déjà prise par un autre utilisateur.";
                        }
                        ?>
                        <input type="email" name="email" placeholder="Adresse e-mail" required>

                        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>

                        <div class="inscription_checkbox" >
                            <input type="checkbox" name="" id="" value="" required>
                            <p> Accepter les <a href="conditions">conditions générales d'utilisateur</a></p>
                        </div>

                        <div class="inscription_submit">
                            <input type="submit" value="S'inscrire">
                        </div>            
                        
                    </form>

                </div>
            </div>
           
        </div>
    </main>


<?php
get_footer();
?>