<?php
get_header();
$author=get_userdata($post->post_author);
/*Template name: Oferta*/
?>
<section class="offers-single">
    <div class="gallery">
        <div class="single-item">
            <img src="<?=get_field('thumbnail')?>">
            <?php if(get_field('photo1')):?>
            <img src="<?=get_field('photo1')?>">
            <?php endif;?>
            <?php if(get_field('photo2')):?>
            <img src="<?=get_field('photo2')?>">
            <?php endif;?>
            <?php if(get_field('photo3')):?>
            <img src="<?=get_field('photo3')?>">
            <?php endif;?>
        </div>
    </div>
    <div class="info">
            <h2><?=$post->post_title;?></h2>
            <span class="price"><?=get_field('price');?></span>
            <p><?=get_field('desc');?></p>
            <span class="date">Ogłoszenie dodano: <?=date_i18n('j F Y H:i', strtotime($post->post_date));?></span>
            <a class="user-ico btn"href="<?=get_author_posts_url($author->ID)?>" class="username">Dodane przez: <?=$author->display_name?></a>
            <a class="email-ico btn" href="mailto:<?=$author->user_email?>">Wyślij email: <?=$author->user_email?></a>
            <a class="phone-ico btn"href="tel:<?=$author->phone_num?>">Zadzwoń: <?=$author->user_phone?></a>
    </div>
</section>
<?php get_footer();?>
<script>
    (function($){
    $( document ).ready(function() {
        $('.single-item').slick({
            dots: true,
            arrows: true,
        });
   })
})(jQuery);
</script>