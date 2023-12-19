<?php

if (isset($_POST['id']) && isset($_POST['mot_de_passe']) && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom'])) {
    if ($_POST['id'] != '' && $_POST['mot_de_passe'] != '' && $_POST['email'] != '' && $_POST['prenom'] != '' && $_POST['nom'] != '') {
        if (username_exists($_POST['id'])) {
            // L'ID est déjà pris
            echo "Erreur : L'ID est déjà pris par un autre utilisateur.";
        } else if (email_exists($_POST['email'])) {
            // L'adresse e-mail est déjà prise
            echo "Erreur : L'adresse e-mail est déjà prise par un autre utilisateur.";
        } else {
            // L'ID est disponible
            if ($_POST['user_adresse'] == '') {
                $_POST['user_adresse'] = 'Non renseigné';
            }

            if ($_POST['phone_number'] == '') {
                $_POST['phone_number'] = 'Non renseigné';
            }

            $user_data = array(
                'user_login'    => $_POST['id'],
                'user_pass'     => $_POST['mot_de_passe'],
                'user_email'    => $_POST['email'],
                'first_name'    => $_POST['prenom'],
                'last_name'     => $_POST['nom'],
                'user_url'      => $_POST['user_adresse'],
                'phone_number'  => $_POST['phone_number'],
            );

            $insert_user = wp_insert_user($user_data);

            $user_id = $insert_user;

            add_role('client', 'Client', array());
            
            $user = new WP_User($user_id);
            $user->set_role('client');
        }
    } else {
        // Afficher un message d'erreur si les champs requis ne sont pas remplis
        echo 'Erreur : Veuillez remplir tous les champs requis.';
    }
}

get_header();

?>


<h1>Inscription</h1>

<form method="post" action="">
    <label for="id">Identifiant :</label>
    <input type="text" name="id" required>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" name="mot_de_passe" required>

    <label for="email">Adresse e-mail :</label>
    <input type="email" name="email" required>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required>

    <label for="nom">Nom :</label>
    <input type="text" name="nom" required>

    <label for="user_adresse">Adresse :</label>
    <input type="text" name="user_adresse">

    <label for="phone_number">Numéro de téléphone :</label>
    <input type="tel" name="phone_number">

    <input type="submit" value="S'inscrire">
</form>


<?php
get_footer();
?>