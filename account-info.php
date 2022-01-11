<?php
get_header();
$author=get_userdata($post->post_author);
/*Template name: Autor*/

if (is_user_logged_in()){
    $current_user;
    get_currentuserinfo();
    echo $current_user->display_name;
    echo $current_user->user_email;
    echo $current_user->ID;
    $dane = get_user_meta($current_user->ID)['phone_num'][0];
    echo ($dane);
    $query = new WP_query([
        'author'=>$current_user->ID,
        'post_type'=>'offers',
        //'post_status' => 'publish',
        'post_status' => 'draft',
    ]);
}
else{
    echo 'Zaloguj się';
}?>
<?php if( $query->have_posts() ) : ?>
    <div class="offer-container">
                    <?php while ($query->have_posts()):$query->the_post();?>
                        <a href="<?php the_permalink()?>" class="single-offer">
                            <span class="offer-title"><?=get_the_title()?></span>
                            <img class="offer-pic" src="<?=get_field('picture')?>">
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
<?php else : ?>
   <h1>Jeszcze nie wystawiono ogłoszeń</h1>
<?php endif;?>
<?php
wp_reset_postdata();
get_footer();
?>