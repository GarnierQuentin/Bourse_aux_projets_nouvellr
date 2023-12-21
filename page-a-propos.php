<?php

get_header();
?>

<main>
    <div class="apropos_desc">
        <div class="apropos_desc_content">
            <h2> DESCRIPTION</h2>
            <div class="apropos_desc_content_imgpc">
            <img src="http://bap.test/wp-content/uploads/2023/12/apropos_etapes.png" alt="">
            </div>
            <div class="apropos_desc_content_imgmobile">
            <img src="http://bap.test/wp-content/uploads/2023/12/apropos_etapes-2.png" alt="">
            </div>
             
            <hr>
            <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                 Non molestias rerum voluptas eos error reiciendis facilis
                  sit magni et officia, sunt a qui quae incidunt! 
                  Quam id a quia quaerat odit eligendi. Dolorem, 
                  aliquid pariatur architecto quaerat reiciendis quam similique, non tempore quae dignissimos maxime 
                officiis laboriosam natus, velit consequuntur.</p>
        </div>
    </div>

    <div class="apropos_question"> 
        <div class="apropos_question_content">
            <div class="apropos_question_content1">
                <h2> DES QUESTIONS ?</h2>
            </div>
            <div class="apropos_question_content2">
                <h2> C'est ici qu'on vous répond !</h2>
            </div>     
            <?php   
            echo do_shortcode('[contact-form-7 id="754170b" title="Formulaire de contact 1"]');
            ?>
         </div>
        
    </div>
</main>

<?php

get_footer();

?>