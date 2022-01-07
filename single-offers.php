<?php
get_header();
$author=get_userdata($post->post_author);
/*Template name: Oferta*/
?>
<section class="offers-single">
        <div class="gallery">
            <img src="<?=get_field('picture')?>">
        </div>
        <div class="info">
            <div class="info-offer">
                <h2><?=$post->post_title;?></h2>
                <span class="price"><?=get_field('price');?></span>
                <p><?=get_field('desc');?></p>
                <span class="date">Ogłoszenie dodano: <?=date_i18n('j F Y H:i', strtotime($post->post_date));?></span>
            </div>
            <div class="info-user">
                <p class="username">Dodane przez: <?=$author->display_name?></p>
                <a href="mailto:<?=$author->user_email?>">Wyślij email: <?=$author->user_email?></a>
                <a href="tel:<?=$author->phone_num?>">Zadzwoń: <?=$author->phone_num?></a>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php get_footer();?>