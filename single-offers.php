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
    <div class="">
        <?php
        $current_user = wp_get_current_user();
        $talk_query = new WP_Query([
            'post_parent'=>$post->ID,
            'post_type'=>'talks',
            'comment_status'=>'open',
            'author'=>$current_user->ID,
            'post_per_page'=>1,
            'fields'=>'ids'
        ]);
        if(1){
            $talk = $talk_query;
            var_dump($talk);
            $comments_query = new WP_Comment_Query;
            $comments = $comments_query->query(
                [
                    'status' => 'approve'
                ]);
            if ( $comments ) {
            foreach ( $comments as $comment ) {
            echo '<p>' . $comment->comment_content . '</p>';
            }
            } else {
            echo 'No comments found.';
            }
            wp_insert_comment([
                   'comment_post_ID'      => $talk,
                   'user_id'              => $current_user->ID,
                   'comment_author'       => $current_user->user_login,
                   'comment_author_email' => $current_user->user_email,
                   'comment_author_url'   => $current_user->user_url,
                   'comment_content'      => 'comment',
            ]);
        }
        else{
                $talk = wp_insert_post([
                'post_parent'=>$post->ID,
                'post_type'=>'talks',
                'comment_status'=>'open'
               ]);
               
            }
            ?>
    </div>
</section>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php get_footer();?>