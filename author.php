<?php 
/*
Template name: Sprzedawcy
*/
get_header();
$curauth = (isset($_GET['author_ID'])) ? get_user_by('ID', $author_ID) : get_userdata(intval($author));
?>
<?php if($curauth->ID == get_current_user_id()):
    $query = new WP_Query(['author'=>$curauth->id,'post_type'=>'offers','post_status' => 'publish','posts_per_page' => 5,
    'paged' => get_query_var('paged')]);?>

<div class="user-account--info">
    <h2>Moje dane:</h2>
    <p class="user-ico btn" class="username">Nazwa użytkownika: <?=$curauth->display_name;?></p>
    <p class="email-ico btn">Email: <?=$curauth->user_email;?></p>
    <p class="phone-ico btn">Telefon: <?=$curauth->phone_num;?></p>
</div>

<h2>Moje ogłoszenia:</h2>
<h3>Aktywne ogłoszenia: <?=$query->post_count?></h3>
<?php if( $query->have_posts() ) : ?>
    <div class="offer-container account">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <a href="<?php the_permalink()?>" class="single-offer">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <img class="offer-pic" src="<?=get_field('thumbnail')?>">
                            <div class="desc">
                                <span class="price"><?=get_field('price')?>zł</span>
                                <span class="size">rozm. <?=get_field('size')->name?></span>
                                <div class="">
                                    <span class="date"><?=get_the_date('d.m.Y')?></span>
                                    <span class="author"><?=get_the_author()?></span>
                                </div>
                            </div>
                        </a>
                        
                        <?php endwhile; ?>
                        <div class="pagination" style="width:100%">
                        <?php 
                            echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $query->max_num_pages,
                                'format'       => '?paged=%#%',
                                'end_size'     => 2,
                                'mid_size'     => 4,
                                'prev_next'    => true,
                            ) );
                        ?>
                </div>
<?php $query = new WP_Query(['author'=>$curauth->ID,'post_type'=>'offers','post_status' => 'draft','posts_per_page' => 5, 'paged' => get_query_var('paged'),]);?>
                </div>
<?php else:?>
    <h3>Brak aktywnych ogłoszeń.</h3>
<?php endif;?>
<?php if( $query->have_posts() ) : ?>
<h3>Ogłoszenia oczekujące na aktywację:</h3>
                <div class="offer-container account">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <a href="<?php the_permalink()?>" class="single-offer">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <img class="offer-pic" src="<?=get_field('thumbnail')?>">
                            <div class="desc">
                                <span class="price"><?=get_field('price')?>zł</span>
                                <span class="size">rozm. <?=get_field('size')->name?></span>
                                <div class="">
                                    <span class="date"><?=get_the_date('d.m.Y')?></span>
                                    <span class="author"><?=get_the_author()?></span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;?>
                </div>
                <div class="pagination">
                        <?php 
                            echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $query->max_num_pages,
                                'format'       => '?paged=%#%',
                                'end_size'     => 2,
                                'mid_size'     => 4,
                                'prev_next'    => true,
                            ) );
                        ?>
                </div>
<?php else:?>
   <h3>Brak oczekujących ogłoszeń.</h3>
<?php endif;?>
<?php else:?>
    <div class="user-account--info">
        <h2>Dane użytkownika</h2>
        <a class="user-ico btn" class="username">Nazwa użytkownika: <?=$curauth->display_name?></a>
        <a class="email-ico btn" href="mailto:<?=$curauth->user_email?>">Wyślij email: <?=$curauth->user_email?></a>
        <a class="phone-ico btn"href="tel:<?=$curauth->phone_num?>">Zadzwoń: <?=$curauth->user_phone?></a>
    </div>
<?php $query = new WP_Query(['author'=>$curauth->ID,'post_type'=>'offers','post_status' => 'publish','posts_per_page' => 5,
    'paged' => get_query_var('paged')]);?>
<?php if( $query->have_posts() ) : ?>
    <h3>Wszystkie ogłoszenia użytkownika:</h3>
    <div class="offer-container account">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <a href="<?php the_permalink()?>" class="single-offer">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <img class="offer-pic" src="<?=get_field('thumbnail')?>">
                            <div class="desc">
                                <span class="price"><?=get_field('price')?>zł</span>
                                <span class="size">rozm. <?=get_field('size')->name?></span>
                                <div class="">
                                    <span class="date"><?=get_the_date('d.m.Y')?></span>
                                    <span class="author"><?=get_the_author()?></span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;?>
                </div>
                <div class="pagination">
                        <?php 
                            echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $query->max_num_pages,
                                'format'       => '?paged=%#%',
                                'end_size'     => 2,
                                'mid_size'     => 4,
                                'prev_next'    => true,
                            ) );
                        ?>
                    </div>
<?php else : ?>
   <h1>Jeszcze nie wystawiono ogłoszeń</h1>
<?php endif;?>
<?php endif;?>
<?php
wp_reset_postdata();
get_footer();
?>