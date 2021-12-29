<?php
/*
Template name: Kontakt
*/

$contact_address_1 = get_theme_mod("contact_address_1");
$contact_address_2 = get_theme_mod("contact_address_2");
$contact_phone = get_theme_mod("contact_phone");
$contact_email = get_theme_mod("contact_email");

get_header();

?>

<section class="start start__subpage">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="start--heading"><?php the_title(); ?></h1>
                <div class="start--breadcrumbs">
                    <a href="<?= get_home_url(); ?>">Start</a>
                    <i class="fas fa-chevron-right"></i>
                    <span><?php the_title(); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <strong>Adres: </strong> <br>
                <?= $contact_address_1 ?> <br>
                <?= $contact_address_2 ?> <br><br>
                <strong>Telefon: </strong> <br>
                <?= $contact_phone ?> <br><br>
                <strong>E-mail: </strong> <br>
                <?= $contact_email ?>
            </div>
            <div class="col-lg-4">
                <?= do_shortcode('[contact-form-7 id="119" title="Formularz 1"]') ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>