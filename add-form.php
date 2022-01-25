<?php
/*
Template name: Dodawanie ogłoszeń
*/
get_header();

?>
    <?php if(is_user_logged_in()) : ?>
        
    <div id="formsubmission"></div>
    <?php else :?>
        <div class="">
            <h1>Musisz być zalogowany, aby dodawać ogłoszenia</h1>
            <h2><a href="<?=get_template_directory_uri()?>/zaloguj">Zaloguj się</a></h2>
            <?php endif;?>
        </div>

    <?php get_footer() ?>