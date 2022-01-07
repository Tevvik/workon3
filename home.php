<?php 
/*
Template name: Strona główna
*/
get_header();
$slogan='Nie nosisz? Więc sprzedaj!';
$path=get_template_directory_uri().'\\';
$ico_w_1=$path.'photo\kurtka-m.png';
$ico_w_2=$path.'photo\buty-k.png';
$ico_w_3=$path.'photo\akcesoria-w.png';
$ico_w_4=$path.'photo\bluzy_i_swetry-k.png';
$ico_w_5=$path.'photo\bluzka_i_tshirt-k.png';
$ico_m_1=$path.'photo\kurtka-k.png';
$ico_m_2=$path.'photo\buty-m.png';
$ico_m_3=$path.'photo\akcesoria-m.png';
$ico_m_4=$path.'photo\bluzy_i_swetry-m.png';
$ico_m_5=$path.'photo\bluzka_i_tshirt-m.png';
?>
<div class="hero">
    <div class="background">
    </div>
    <div class="slogan">
        <h1><?=$slogan?></h1>
        <a href="">Sprzedaj teraz</a>
        <a href="">O nas</a>
    </div>
</div>
<div class="categories">
    <h3>Kategorie</h3>
        <div class="women">
                <a href="#"class="d-flex flex-column"><img src="<?=$ico_w_1?>">Płaszcze i kurtki</a>
                <a href="#"class="d-flex flex-column"><img src="<?=$ico_w_2?>">Buty</a>
                <a href="#"class="d-flex flex-column"><img src="<?=$ico_w_3?>">Akcesoria</a>
                <a href="#"class="d-flex flex-column"><img src="<?=$ico_w_4?>">Bluzy i swetry</a>
                <a href="#"class="d-flex flex-column"><img src="<?=$ico_w_5?>">Bluzki i T-shirty</a>
        </div>
    </div>
</div>
<?php
    $query = new WP_Query([
        'post_type'=>'offers',
        'post_status'=>'publish',
        'posts_per_page' => 2,
        'orderby'=>[
            'date'=>'DESC'
        ],
    ]);
?>
<?php if( $query->have_posts() ) : ?>
    <div class="extra">
        <h2>Wyróżnione</h2>
                <div class="offer-container">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <a href="<?php the_permalink()?>" class="single-offer">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <div class="offer-pic" style="background-image: url(<?=get_field('picture')?>)"></div>
                            <div class="desc">
                                <span class="price"><?=get_field('price')?>zł</span>
                                <span class="size">rozm. <?=get_field('size')?></span>
                                <div class="">
                                    <span class="date"><?=get_the_date('d.m.Y')?></span>
                                    <span class="author"><?=get_the_author()?></span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;?>
                </div>
    </div>
<?php else : ?>
<?php endif;?>
<?php include 'footer.php';?>
<?php get_footer(); ?>