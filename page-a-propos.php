<?php

get_header();


echo the_post_thumbnail();

echo get_the_content();



?>

<h1>DES QUESTIONS ?</h1>
<p>C'est ici qu'on vous répond !</p>

<?php
echo do_shortcode('[contact-form-7 id="754170b" title="Formulaire de contact 1"]');

get_footer();

?>