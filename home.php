<?php 
/*
Template name: Strona główna
*/
get_header();
$slogan='Nie nosisz? Więc sprzedaj!';
?>
<div class="hero">
    <div class="background">
    </div>
    <form class="big-search" action="<?= get_template_directory_uri()?>/oferty">
        <input type="text" name="search" placeholder="Czego pragniesz?">
        <input type="submit" value="Szukaj">
    </form>
</div>
<div class="categories">
    <h3>Kategorie</h3>
    <?php foreach (get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'all','parent'=>'0']) as $category) :?>
        <div class="category-container">
            <h4><?=$category->name?></h4>
            <?php foreach (get_terms(['taxonomy'=>'offers','hide_empty' => false,'fields'=>'all','parent'=>$category->term_id]) as $subcat) :?>
                <a class="category" href="<?=get_template_directory_uri()?>/oferty/?category[0]=<?=$subcat->term_id?>">
                    <img src="<?=get_template_directory_uri()?>/images/x<?=$subcat->term_id?>.PNG" alt="<?=$subcat->name?>">
                    <span><?=$subcat->name?></span> 
                </a>
            <?php endforeach;?>
        </div>
    <?php endforeach;?>
</div>
<?php
    $query = new WP_Query([
        'post_type'=>'offers',
        'post_status'=>'publish',
        'posts_per_page' => 5,
        'orderby'=>[
            'date'=>'DESC'
        ],
    ]);
?>
<section class="center">
    <?php if( $query->have_posts() ) : ?>
    <div class="extra">
        <h2>Najnowsze</h2>
                <div class="offer-container autoplay">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <div>
                        <a href="<?php the_permalink()?>" class="single-offer" style="width:90%">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <img class="offer-pic" src="<?=get_field('thumbnail')?>">
                            <div class="desc">
                                <span class="price"><?=get_field('price')?>zł</span>
                                
                                <div class="">
                                    <span class="date"><?=get_the_date('d.m.Y')?></span>
                                    <span class="author"><?=get_the_author()?></span>
                                </div>
                            </div>
                        </a>
                        </div>
                    <?php endwhile;?>
                </div>
    </div>
<?php else : ?>
<?php endif;?>
</section>
<?php get_footer(); ?>
<script>
    (function($){
   $( document ).ready(function() {
        $('.autoplay').slick({
            dots: false,
            arrows: true,
            infinite: true,
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 4,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                breakpoint: 1200,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 1000,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
                },
                {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
            });
   })
})(jQuery);
</script>